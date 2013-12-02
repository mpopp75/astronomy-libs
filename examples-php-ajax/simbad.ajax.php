<?php
require_once '../libs-php/Simbad.php';
require_once '../libs-php/Distances.php';
require_once '../libs-php/Coordinates.php';
use mpopp75\AstronomyLibs as alibs;

$object = isset($_POST['object']) ? htmlentities($_POST['object'], ENT_QUOTES, "UTF-8") : null;
$request = in_array($_POST['request'], array('originalname', 'aliases', 'coordinates', 'spectraltype', 'distance', 'fullreply')) ? $_POST['request'] : null;

$simbad = new alibs\Simbad($object);

switch($request) {
    case "originalname" :
        $originalName = $simbad->getOriginalName();

        print $originalName;
        break;
    case "aliases" :
        $aliases = $simbad->getAliases();

        foreach ($aliases as $a) {
            print $a . "<br>\n";
        }
        break;
    case "coordinates" :
        $coordinates = $simbad->getCoordinates();

        print "RA: " . alibs\Coordinates::float2text($coordinates['jradeg'], 'hms') . "<br>\n";
        print "DE: " . alibs\Coordinates::float2text($coordinates['jdedeg'], 'symbols') . "<br>\n";
        break;
    case "spectraltype" :
        $spectralType = $simbad->getSpectralType();

        print "Spectral Type: " . $spectralType;
        break;
    case "distance" :
        $distance = $simbad->getDistance();

        print number_format($distance, 3, ".", "") . " pc<br>\n";
        print number_format(alibs\Distances::pc2ly($distance), 3, ".", "") . " ly\n";
        break;
    case "fullreply" :
        $xml = $simbad->getXml();

        print "<pre>";
        print htmlentities($xml, ENT_QUOTES, "UTF-8");
        print "</pre>";
}