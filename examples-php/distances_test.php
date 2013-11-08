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
$lat1 = "49° 15' 32.4\"";
$lon1 = "15d 3m 14.33s";
$lat2 = "50 13 9.39";
$lon2 = "16h 49m 11.5s";

$location1 = new alibs\Location($lat1, $lon1);
$location2 = new alibs\Location($lat2, $lon2);

$distance = alibs\Distances::distanceBetween($location1, $location2);
print "<p>The distance between location 1 and 2 is " . $distance . " kilometers.</p>\n";
?>
</body>
</html>