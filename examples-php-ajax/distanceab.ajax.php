<?php
require_once '../libs-php/Distances.php';
require_once '../libs-php/Coordinates.php';
use mpopp75\AstronomyLibs as alibs;

// distance to point A
$distanceA = (float)$_POST['distancea'];
// distance to point B
$distanceB = (float)$_POST['distanceb'];
//make sure angle is a float
$gamma     = alibs\Coordinates::text2float($_POST['gamma']);

print alibs\Distances::calcDistanceAB($distanceA, $distanceB, $gamma);