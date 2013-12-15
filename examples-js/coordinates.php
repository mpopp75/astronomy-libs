<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AstronomyLibs::Coordinates Examples (JS)</title>
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/examples.css">
<link rel="shortcut icon" href="../favicon/moon.png">
<script src="../libs-js/coordinates.js"></script>
</head>
<body>
<?php include '../page_header.inc.php'; ?>

<article>
<h1>Coordinates</h1>

<p>Uses the following functions:</p>

<ul>
    <li>AstronomyLibs_Coordinates_float2text</li>
    <li>AstronomyLibs_Coordinates_text2float</li>
</ul>

<p>Enter coordinates in either float form (e.g. 19.59475) or text form (e.g. 19° 16' 32.6") and have
it converted to its counterpart.</p>

<p>Set decimals for the float format (e.g. 3 decimals to get 19.595 for 19.59475) or for the
arcsecond part of the text format (e.g. 3 decimals to get 19° 16' 32.629" for 19° 16' 32.629285").</p>

<p>For conversions from float to text you can set the format of the text representation, for example:</p>

<ul>
    <li>19° 16'32.629"</li>
    <li>19 16 32.629</li>
    <li>19d 16m 32.629s</li>
    <li>19h 16m 32.629s</li>
</ul>

<p>Input allows negative values for degrees, as well as directions N, S, E, W (S &amp; W being converted to negative float values).</p>

<table>
    <thead>
        <tr>
            <td>Float Coordinate</td>
            <td>Text Coordinate</td>
            <td>Format</td>
            <td>Decimals</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="number" step="any" id="floatcoordinates" autofocus oninput="updateFloat2Text()" placeholder="Float"></td>
            <td><input type="text" id="textcoordinates" oninput="updateText2Float()" placeholder="Text"></td>
            <td><select id="format" onchange="updateLastChanged()">
                    <option value="symbols" selected>10° 20' 30.4"</option>
                    <option value="spaces">10 20 30.4</option>
                    <option value="dms">10d 20m 30.4s</option>
                    <option value="hms">10h 20m 30.4s</option>
                </select>
            </td>
            <td><input type="number" min="0" id="decimals" class="shortinput" value="" oninput="updateLastChanged()"></td>
        </tr>
    </tbody>
</table>
<script>
// set input fields
var floatcoordinates = document.getElementById('floatcoordinates');
var textcoordinates  = document.getElementById('textcoordinates');
var format           = document.getElementById('format');
var decimals         = document.getElementById('decimals');

// set variable which of float or text field was updated last
var last_updated = null;

function updateFloat2Text() {
    last_updated = "f2t";

    if (decimals.value == "") {
        textcoordinates.value = AstronomyLibs_Coordinates_float2text(floatcoordinates.value, format.value);
    } else {
        textcoordinates.value = AstronomyLibs_Coordinates_float2text(floatcoordinates.value, format.value, decimals.value);
    }
}

function updateText2Float() {
    last_updated = "t2f";

    if (decimals.value == "") {
        floatcoordinates.value = AstronomyLibs_Coordinates_text2float(textcoordinates.value);
    } else {
        floatcoordinates.value = AstronomyLibs_Coordinates_text2float(textcoordinates.value, decimals.value);
    }
}

/* if format or decimals are changed, update either
   float or text input field depending on which was
   last updated */
function updateLastChanged() {
    if (last_updated == "f2t") {
        updateFloat2Text();
    } else if (last_updated == "t2f") {
        updateText2Float();
    }
}
</script>
</article>
</body>
</html>