<?php
namespace mpopp75\AstronomyLibs;
require_once 'Coordinates.php';

class Location extends Coordinates
{
    protected $latitude;
    protected $longitude;

    /**
     * __construct($latitude, $longitude)
     *
     * convert miles to kilometers
     *
     * @param mixed $latitude latitude in any format supported by Coordinates class
     * @param mixed $longitude longitude in any format supported by Coordinates class
     * @author Markus Popp <git@mpopp.net>
     */
    public function __construct($latitude, $longitude) {
        if (! is_integer($latitude) && ! is_double($latitude)) {
            $latitude = parent::text2float($latitude);
        }

        if (! is_integer($longitude) && ! is_double($longitude)) {
            $longitude = parent::text2float($longitude);
        }

        $this->latitude  = (float)$latitude;
        $this->longitude = (float)$longitude;
    }

    /**
     * getLocation()
     *
     * returns array containing latitude/longitude
     *
     * @author Markus Popp <git@mpopp.net>
     * @return array    array containing latitude and longitude
     */
    public function getLocation() {
        return array("latitude" => $this->latitude, "longitude" => $this->longitude);
    }
}