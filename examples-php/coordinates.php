<?php
require_once '../libs-php/Coordinates.php';
use mpopp75\AstronomyLibs as alibs;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AstronomyLibs::Coordinates Examples (PHP)</title>
<link rel="stylesheet" href="../css/styles.css">
<link rel="shortcut icon" href="../favicon/moon.png">
</head>
<body>
<?php
$textCoordinate = "-359° 9' 13.799\"";

$floatCoordinate = alibs\Coordinates::text2Float($textCoordinate);

if ($floatCoordinate == false) {
    print "<p>$textCoordinate is an invalid entry.</p>";
} else {
    print "<p>The float representation of $textCoordinate is $floatCoordinate.</p>";
}

$floatCoordinate = -359.15383;

$textCoordinate = alibs\Coordinates::float2Text($floatCoordinate);

print "<p>The text representation of $floatCoordinate is $textCoordinate.</p>";
?>
</body>
</html>