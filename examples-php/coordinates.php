<?php
require_once '../libs-php/Coordinates.php';
use mpopp75\AstronomyLibs as alibs;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AstronomyLibs::Coordinates Examples</title>
<link rel="stylesheet" href="../css/styles.css">
<link rel="shortcut icon" href="../favicon/moon.png">
</head>
<body>
<?php
$textCoordinate = "-29°37'22.8\"";

$floatCoordinate = alibs\Coordinates::textToFloat($textCoordinate);

print "<p>The float representation of $textCoordinate is $floatCoordinate.</p>";
?>
</body>
</html>