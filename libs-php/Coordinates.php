<?php
namespace mpopp75\AstronomyLibs;

class Coordinates
{
    /**
     * text2Float($textCoordinates)
     *
     * get float representation of coordinates
     *
     * @param string $textCoordinate text form of coordinates (e.g. +19°10'49.0")
     * @author Markus Popp <git@mpopp.net>
     * @return float $floatCoordinate float representation (e.g. 19.180277778)
     */
    public static function text2Float($textCoordinate) {
        // regex to extract parts needed for calcuation
        $regex = "/([+-]?)(\d{1,2})°(\d{1,2})'(\d{1,2}(?:\.\d*))\"?/";

        $matches = array();
        preg_match_all($regex, $textCoordinate, $matches);

        $floatCoordinate = ((float)$matches[2][0]) +
                           ((float)$matches[3][0]) / 60 +
                           ((float)$matches[4][0]) / 3600;

        // if coordinates are negative
        if ($matches[1][0] == "-") {
            $floatCoordinate = -$floatCoordinate;
        }

        return $floatCoordinate;
    }

    /**
     * float2Text($floatCoordinate, $decimals)
     *
     * get text representation of coordinates
     *
     * @param float $floatCoordinate coordinates as float value  (e.g. -19.180277778)
     * @param int $decimals number of decimals to display for arcseconds; default is 1
     * @author Markus Popp <git@mpopp.net>
     * @return string $textCoordinate text representation (e.g. -19°10'49.0")
     */
    public static function float2Text($floatCoordinate, $decimals = 1) {
        $degrees = (int)$floatCoordinate;

        $minutesFull = abs((int)$floatCoordinate - $floatCoordinate) * 60;

        $minutes = (int)$minutesFull;

        $seconds = number_format((($minutesFull - $minutes) * 60), $decimals, ".", "");

        $textCoordinate = $degrees . "°" . $minutes . "'" . $seconds . "\"";

        return $textCoordinate;
    }
}