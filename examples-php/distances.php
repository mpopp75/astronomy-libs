<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AstronomyLibs::Distances Examples (PHP)</title>
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/examples.css">
<link rel="shortcut icon" href="../favicon/moon.png">
<script src="../libs-js/coordinates.js"></script> <!-- required by location.js -->
<script src="../libs-js/location.js"></script>
</head>
<body>
<?php include '../page_header.inc.php'; ?>

<h1>Distances</h1>

<h2>Namespace: mpopp75\AstronomyLibs</h2>

<p>Uses the following methods:</p>

<ul>
    <li>Distances::mi2km</li>
    <li>Distances::km2mi</li>
    <li>Distances::au2km</li>
    <li>Distances::km2au</li>
    <li>Distances::ly2au</li>
    <li>Distances::au2ly</li>
    <li>Distances::pc2ly</li>
    <li>Distances::ly2pc</li>
</ul>

<p>Enter a float value in any of the input fields, and it will be converted to the corresponding values of the other units.</p>

<table>
    <thead>
        <tr>
            <td>Kilometers</td>
            <td>Miles</td>
            <td>Astronomical Units</td>
            <td>Light Years</td>
            <td>Parsecs</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="number" step="any" id="km" oninput="updateDistances('km')" placeholder="Kilometers" autofocus></td>
            <td><input type="number" step="any" id="mi" oninput="updateDistances('mi')" placeholder="Miles"></td>
            <td><input type="number" step="any" id="au" oninput="updateDistances('au')" placeholder="Astronomical Units"></td>
            <td><input type="number" step="any" id="ly" oninput="updateDistances('ly')" placeholder="Light Years"></td>
            <td><input type="number" step="any" id="pc" oninput="updateDistances('pc')" placeholder="Parsecs"></td>
        </tr>
    </tbody>
</table>
<script>
// set input fields
var km = document.getElementById('km');
var mi = document.getElementById('mi');
var au = document.getElementById('au');
var ly = document.getElementById('ly');
var pc = document.getElementById('pc');

function updateDistances(field) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "../examples-php-ajax/distances.ajax.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("field=" + field + "&value=" + eval(field).value);
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // parse JSON response to Javascript array
            var response = JSON.parse(xmlhttp.responseText);
            switch (field) {
                case "km" :
                    mi.value = response.mi;
                    au.value = response.au;
                    ly.value = response.ly;
                    pc.value = response.pc;
                    break;
                case "mi" :
                    km.value = response.km;
                    au.value = response.au;
                    ly.value = response.ly;
                    pc.value = response.pc;
                    break;
                case "au" :
                    km.value = response.km;
                    mi.value = response.mi;
                    ly.value = response.ly;
                    pc.value = response.pc;
                    break;
                case "ly" :
                    km.value = response.km;
                    mi.value = response.mi;
                    au.value = response.au;
                    pc.value = response.pc;
                    break;
                case "pc" :
                    km.value = response.km;
                    mi.value = response.mi;
                    au.value = response.au;
                    ly.value = response.ly;
            }
        }
    }
}
</script>
<hr>
<p>Uses the following methods:</p>

<ul>
    <li>Distances::distanceBetween</li>
</ul>

<p>Calculates the distance between Location A and Location B based on their geographical coordinates.
Values can be entered as either float or text (as supported by Coordinates::float2text).</p>

<table>
    <thead>
        <tr>
            <td>&nbsp;</td>
            <td>Latitude</td>
            <td>Longitude</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
       <tr>
            <td>Location A:</td>
            <td><input type="text" id="lat_a" oninput="calcDistance()"></td>
            <td><input type="text" id="lon_a" oninput="calcDistance()"></td>
            <td><button onclick="getCurrentLocation()">Get Current Location</button>
       </tr>
       <tr>
            <td>Location B:</td>
            <td><input type="text" id="lat_b" oninput="calcDistance()"></td>
            <td><input type="text" id="lon_b" oninput="calcDistance()"></td>
            <td>&nbsp;</td>
       </tr>
       <tr>
            <td>Distance:</td>
            <td><span id="distance"></span></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
       </tr>
    </tbody>
</table>
<script>
var lat_a    = document.getElementById('lat_a');
var lon_a    = document.getElementById('lon_a');
var lat_b    = document.getElementById('lat_b');
var lon_b    = document.getElementById('lon_b');
var distance = document.getElementById('distance');

function calcDistance() {
    if(lat_a.value != "" &&
       lat_b.value != "" &&
       lon_a.value != "" &&
       lon_b.value != "") {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "../examples-php-ajax/distance-between.ajax.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("lata=" + lat_a.value + "&lona=" + lon_a.value + "&latb=" + lat_b.value + "&lonb=" + lon_b.value);
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    distance.innerHTML = xmlhttp.responseText;
                } else {
                    distance.innerHTML = "error";
                }
            }
    } else {
        distance.innerHTML = "";
    }
}

function getCurrentLocation() {
    AstronomyLibs_Location_Current(function() {
        lat_a.value = AstronomyLibs_Coordinates_float2text(this.latitude);
        lon_a.value = AstronomyLibs_Coordinates_float2text(this.longitude);
    });
}
</script>
<hr>
<p>Uses the following method:</p>

<ul>
    <li>Distances::calcDistanceAB</li>
</ul>

<p>This calculates distance between point A and point B providing distance to both points A and B and the angle separating them (gamma). Output distance unit is identical to input distance units. Calculation method used is the law of cosines as described at <a href="http://en.wikipedia.org/wiki/Law_of_cosines#Applications">http://en.wikipedia.org/wiki/Law_of_cosines#Applications</a></p>
<table>
<tbody>
    <tr>
        <td>Distance to A: </td>
        <td><input type="number" min="0" step="any" id="distancea" placeholder="Enter distance to A" value="" oninput="calcDistanceAB()"></td>
    </tr>
    <tr>
        <td>Distance to B: </td>
        <td><input type="number" min="0" step="any" id="distanceb" placeholder="Enter distance to B" value="" oninput="calcDistanceAB()"></td>
    </tr>
    <tr>
        <td>Angle γ: </td>
        <td><input type="text" id="anglegamma" placeholder="Enter angle γ" value="" oninput="calcDistanceAB()"></td>
    </tr>
    <tr>
        <td>Distance from A to B: </td>
        <td id="distanceab"></td>
    </tr>
</tbody>
</table>
<script>
var distancea  = document.getElementById('distancea');
var distanceb  = document.getElementById('distanceb');
var anglegamma = document.getElementById('anglegamma');
var distanceab = document.getElementById('distanceab');

function calcDistanceAB() {
    if (distancea.value  != "" &&
        distanceb.value  != "" &&
        anglegamma.value != "") {

        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "../examples-php-ajax/distanceab.ajax.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("distancea=" + distancea.value + "&distanceb=" + distanceb.value + "&gamma=" + anglegamma.value);
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                distanceab.innerHTML = xmlhttp.responseText;
            } else {
                distanceab.innerHTML = "";
            }
        }
    }
}
</script>
</body>
</html>