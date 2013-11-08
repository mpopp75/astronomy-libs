<?php
require_once '../libs-php/Distances.php';
use mpopp75\AstronomyLibs as alibs;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AstronomyLibs::Distances Test (PHP)</title>
<link rel="stylesheet" href="../css/styles.css">
<link rel="shortcut icon" href="../favicon/moon.png">
</head>
<body>
<?php
// Moscow
$lat1 = "55° 45' 05.5\"";
$lon1 = "37d 37m 02.7s";
// Madrid
$lat2 = "40 24 49.4";
$lon2 = "-3h 42m 22.6s";

$location1 = new alibs\Location($lat1, $lon1);
$location2 = new alibs\Location($lat2, $lon2);

$distance = alibs\Distances::distanceBetween($location1, $location2);
print "<p>The distance between location 1 and 2 is " . $distance . " kilometers.</p>\n";
?>
</body>
</html>