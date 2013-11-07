<?php
namespace mpopp75\AstronomyLibs;

class Distances
{
    // miles to kilometers
    const MILES2KM = 1.60934;

    // astronomical units to kilometers
    const AU2KM    = 149597870.7;

    // light years to astronomical units
    const LY2AU    = 63241.077;

    // parsecs to light years
    const PC2LY    = 3.26156;

    /**
     * miles2km($miles)
     *
     * convert miles to kilometers
     *
     * @param float $miles value in miles
     * @author Markus Popp <git@mpopp.net>
     * @return float   equivalent value in kilometers
     */
    public static function miles2km($miles) {
        return $miles * self::MILES2KM;
    }

    /**
     * km2miles($km)
     *
     * convert kilometers to miles
     *
     * @param float $km value in kilometers
     * @author Markus Popp <git@mpopp.net>
     * @return float   equivalent value in miles
     */
    public static function km2miles($km) {
        return $km / self::MILES2KM;
    }

    /**
     * au2km($au)
     *
     * convert astronomical units to kilometers
     *
     * @param float $au value in astronomical units
     * @author Markus Popp <git@mpopp.net>
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
     * @return float   equivalent value in parsecs
     */
    public static function ly2pc($ly) {
        return $pc / self::PC2LY;
    }
}