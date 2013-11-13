<?php
namespace mpopp75\AstronomyLibs;
require_once 'Location.php';

class Distances
{
    // miles to kilometers
    const MI2KM = 1.60934;

    // astronomical units to kilometers
    const AU2KM    = 149597870.7;

    // light years to astronomical units
    const LY2AU    = 63241.077;

    // parsecs to light years
    const PC2LY    = 3.26156;

    // Earth radius in kilometers
    const EARTH_RADIUS = 6371.009;

    /**
     * distanceBetween($location1, $location2)
     *
     * calculates distance in kilometers between location 1 and location 2
     * formula used from http://en.wikipedia.org/wiki/Great-circle_distance#Formulas
     *
     * @param Location $location1 Location object
     * @param Location $location2 Location object
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return float   distance between location 1 and location 2 in kilometers
     */
    public static function distanceBetween($location1, $location2) {
        $location1Coordinates = $location1->getLocation();
        $location2Coordinates = $location2->getLocation();
        $lat1 = $location1Coordinates['latitude'];
        $lon1 = $location1Coordinates['longitude'];
        $lat2 = $location2Coordinates['latitude'];
        $lon2 = $location2Coordinates['longitude'];

        return self::EARTH_RADIUS *
                (acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
                      cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad(abs($lon2 - $lon1)))));
    }

    /**
     * mi2km($mi)
     *
     * convert miles to kilometers
     *
     * @param float $mi value in miles
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return float   equivalent value in kilometers
     */
    public static function mi2km($mi) {
        return $mi * self::MI2KM;
    }

    /**
     * km2mi($km)
     *
     * convert kilometers to miles
     *
     * @param float $km value in kilometers
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return float   equivalent value in miles
     */
    public static function km2mi($km) {
        return $km / self::MI2KM;
    }

    /**
     * au2km($au)
     *
     * convert astronomical units to kilometers
     *
     * @param float $au value in astronomical units
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return float   equivalent value in kilometers
     */
    public static function au2km($au) {
        return $au * self::AU2KM;
    }

    /**
     * km2au($km)
     *
     * convert kilometers to astronomical units
     *
     * @param float $km value in astronomical units
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return float   equivalent value in astronomical units
     */
    public static function km2au($km) {
        return $km / self::AU2KM;
    }

    /**
     * ly2au($ly)
     *
     * convert light years to astronomical units
     *
     * @param float $ly value in light years
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return float   equivalent value in astronomical units
     */
    public static function ly2au($ly) {
        return $ly * self::LY2AU;
    }

    /**
     * au2ly($au)
     *
     * convert light years to light years
     *
     * @param float $au value in astronomical units
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return float   equivalent value in light years
     */
    public static function au2ly($au) {
        return $au / self::LY2AU;
    }

    /**
     * pc2ly($pc)
     *
     * convert parsecs to light years
     *
     * @param float $pc value in parsecs
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return float   equivalent value in light years
     */
    public static function pc2ly($pc) {
        return $pc * self::PC2LY;
    }

    /**
     * ly2pc($ly)
     *
     * convert light years to light parsecs
     *
     * @param float $ly value in light years
     * @author Markus Popp <git@mpopp.net>
     * @license http://www.opensource.org/licenses/mit-license.html MIT License
     * @return float   equivalent value in parsecs
     */
    public static function ly2pc($ly) {
        return $ly / self::PC2LY;
    }
}