<?php
namespace mpopp75\AstronomyLibs;

class Template
{
    /**
     * doSomething($in)
     *
     * Description
     *
     * @param mixed $in input value
     * @author Markus Popp <git@mpopp.net>
     * @return float $out the float representation of $in
     */
    public static function doSomething($in) {

        $out = (float)$in;

        return $out;
    }
}