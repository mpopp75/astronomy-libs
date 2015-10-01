<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Astronomy Libs</title>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/index.css">
<link rel="shortcut icon" href="favicon/moon.png">
</head>
<body>
<?php include 'page_header.inc.php'; ?>

<div id="php">
<h1>PHP</h1>

<ul>
    <li><a href="examples-php/coordinates.php">Coordinates</a></li>
    <li><a href="examples-php/distances.php">Distances</a></li>
    <li><a href="examples-php/simbad.php">Simbad</a></li>
</ul>
</div>

<div id="js">
<h1>Javascript</h1>

<ul>
    <li><a href="examples-js/coordinates.php">Coordinates</a></li>
    <li><a href="examples-js/distances.php">Distances</a></li>
</ul>
</div>

<div id="more"><a href="javascript:toggleAbout()">More&nbsp;&raquo;</a></div>
<div id="about" style="display: none">
<?php include 'README.html'; ?>
</div>
<script>
var about = document.getElementById('about');
function toggleAbout() {
    if (about.style.display == 'none') {
        about.style.display = 'block';
    } else {
        about.style.display = 'none';
    }
}
</script>
</body>
</html>