<?php
require_once '../libs-php/_Template.php';
use mpopp75\AstronomyLibs as alibs;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AstronomyLibs::Template Examples (PHP)</title>
<link rel="stylesheet" href="../css/styles.css">
<link rel="shortcut icon" href="../favicon/moon.png">
</head>
<body>
<?php
$in = "3.14159265xyz";

$out = $floatCoordinate = alibs\Template::doSomething($in);

print "<p>Passing $in into doSomething(\$in) returns $out.</p>";
?>
</body>
</html>