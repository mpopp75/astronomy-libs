<?php
require_once '../libs-php/Distances.php';
require_once '../libs-php/Location.php';
require_once '../libs-php/Coordinates.php';
use mpopp75\AstronomyLibs as alibs;

$latA = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
$lonA = isset($_REQUEST['lona']) ? $_REQUEST['lona'] : null;
$latB = isset($_REQUEST['latb']) ? $_REQUEST['latb'] : null;
$lonB = isset($_REQUEST['lonb']) ? $_REQUEST['lonb'] : null;

// convert text coordinates to float coordinates
if (! is_integer($latA) && ! is_double($latA)) {
    $latA = alibs\Coordinates::text2float($latA);
}

if (! is_integer($lonA) && ! is_double($lonA)) {
    $lonA = alibs\Coordinates::text2float($lonA);
}

if (! is_integer($latB) && ! is_double($latB)) {
    $latB = alibs\Coordinates::text2float($latB);
}

if (! is_integer($lonB) && ! is_double($lonB)) {
    $lonB = alibs\Coordinates::text2float($lonB);
}

// make absolutely sure they are float values
$latA = (float)$latA;
$lonA = (float)$lonA;
$latB = (float)$latB;
$lonB = (float)$lonB;

// create Location objects using mpopp75\AstronomyLibs\Location class
$locationA = new alibs\Location($latA, $lonA);
$locationB = new alibs\Location($latB, $lonB);

// calculate distance using mpopp/AstronomyLibs/Distances::distanceBetween method
$distanceKm = alibs\Distances::distanceBetween($locationA, $locationB);
$distanceMi = alibs\Distances::km2mi($distanceKm);
print number_format($distanceKm, 2, ".", ",") . " km (" . number_format($distanceMi, 2, ".", ",") . " mi)";