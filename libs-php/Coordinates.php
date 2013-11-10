<?php
namespace mpopp75\AstronomyLibs;

class Coordinates
{
    /**
     * float2text($floatCoordinate, $decimals)
     *
     * get text representation of coordinates
     *
     * @param float $floatCoordinate coordinates as float value  (e.g. -19.180277778)
     * @param string $format which format to output
     * @param int $decimals number of decimals to display for arcseconds; default is 1
     * @author Markus Popp <git@mpopp.net>
     * @return string   text representation (e.g. -19° 10' 49.0")
     */
    public static function float2text($floatCoordinate,  $format = "symbols", $decimals = 1) {
        $degrees = (int)$floatCoordinate;

        $minutesFull = abs((int)$floatCoordinate - $floatCoordinate) * 60;

        $minutes = (int)$minutesFull;

        $seconds = number_format((($minutesFull - $minutes) * 60), $decimals, ".", "");

        switch ($format) {
            case "symbols" :
                $textCoordinate = $degrees . "° " . $minutes . "' " . $seconds . "\"";
                break;
            case "spaces" :
                $textCoordinate = $degrees . " " . $minutes . " " . $seconds;
                break;
            case "dms" :
                $textCoordinate = $degrees . "d " . $minutes . "m " . $seconds . "s";
                break;
            case "hms" :
                $textCoordinate = $degrees . "h " . $minutes . "m " . $seconds . "s";
                break;
            default :
                $textCoordinate = "";
        }

        return $textCoordinate;
    }

    /**
     * text2float($textCoordinates)
     *
     * get float representation of coordinates
     *
     * @param string $textCoordinate text form of coordinates (e.g. +19° 10' 49.0")
     * @param int $decimals number of decimals
     * @author Markus Popp <git@mpopp.net>
     * @return float    float representation (e.g. 19.180277778)
     */
    public static function text2float($textCoordinate, $decimals = null) {
        $matches = array();
        if (preg_match("/^([NSEW+-])?\s*([0-9.]+)$/", $textCoordinate, $matches)) {
            // input is already a valid float value, return right away

            // if coordinates are negative
            if ($matches[1] == "S" ||
                $matches[1] == "W") {
                $textCoordinate = -((float)$matches[2]);
            }

            if ($decimals === null) {
                return (float)$textCoordinate;
            } else {
                return number_format((float)$textCoordinate, $decimals, ".", "");
            }
        }

        // regex to extract parts needed for calcuation
        $regex = "/([NSEW+-]?)\s*(\d{1,3})\s*[°dh ]\s*(?:(\d{1,2})\s*['m]?\s*)?(?:(\d{1,2}(?:\.\d*)?)\s*[\"s]?\s*)?\s*([NSEW+-]?)/u";

        $matches = array();
        if (! preg_match_all($regex, $textCoordinate, $matches)) {
            return false;
        }

        // ensure arcmins & arcsecs are valid
        if ($matches[3][0] > 59 || $matches[4][0] >= 60) {
            return false;
        }

        $floatCoordinate = ((float)$matches[2][0]) +
                           ((float)$matches[3][0]) / 60 +
                           ((float)$matches[4][0]) / 3600;

        // if coordinates are negative
        if ($matches[1][0] == "-" ||
            $matches[1][0] == "S" ||
            $matches[1][0] == "W" ||
            $matches[5][0] == "S" ||
            $matches[5][0] == "W") {
            $floatCoordinate = -$floatCoordinate;
        }

        if ($decimals === null) {
            return $floatCoordinate;
        } else {
            return number_format($floatCoordinate, $decimals, ".", "");
        }
    }
}