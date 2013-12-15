<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AstronomyLibs::Distances Examples (JS)</title>
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/examples.css">
<link rel="shortcut icon" href="../favicon/moon.png">
<script src="../libs-js/coordinates.js"></script> <!-- required by location.js -->
<script src="../libs-js/location.js"></script>
<script src="../libs-js/distances.js"></script>
</head>
<body>
<?php include '../page_header.inc.php'; ?>

<article>
<h1>Distances</h1>

<p>Uses the following functions:</p>

<ul>
    <li>AstronomyLibs_Distances_mi2km</li>
    <li>AstronomyLibs_Distances_km2mi</li>
    <li>AstronomyLibs_Distances_au2km</li>
    <li>AstronomyLibs_Distances_km2au</li>
    <li>AstronomyLibs_Distances_ly2au</li>
    <li>AstronomyLibs_Distances_au2ly</li>
    <li>AstronomyLibs_Distances_pc2ly</li>
    <li>AstronomyLibs_Distances_ly2pc</li>
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
    switch (field) {
        case 'km' :
            mi.value = AstronomyLibs_Distances_km2mi(km.value);
            au.value = AstronomyLibs_Distances_km2au(km.value);
            ly.value = AstronomyLibs_Distances_au2ly(au.value);
            pc.value = AstronomyLibs_Distances_ly2pc(ly.value);
            break;
        case 'mi' :
            km.value = AstronomyLibs_Distances_mi2km(mi.value);
            au.value = AstronomyLibs_Distances_km2au(km.value);
            ly.value = AstronomyLibs_Distances_au2ly(au.value);
            pc.value = AstronomyLibs_Distances_ly2pc(ly.value);
            break;
        case 'au' :
            km.value = AstronomyLibs_Distances_au2km(au.value);
            mi.value = AstronomyLibs_Distances_km2mi(km.value);
            ly.value = AstronomyLibs_Distances_au2ly(au.value);
            pc.value = AstronomyLibs_Distances_ly2pc(ly.value);
            break;
        case 'ly' :
            au.value = AstronomyLibs_Distances_ly2au(ly.value);
            km.value = AstronomyLibs_Distances_au2km(au.value);
            mi.value = AstronomyLibs_Distances_km2mi(km.value);
            pc.value = AstronomyLibs_Distances_ly2pc(ly.value);
            break;
        case 'pc' :
            ly.value = AstronomyLibs_Distances_pc2ly(pc.value);
            au.value = AstronomyLibs_Distances_ly2au(ly.value);
            km.value = AstronomyLibs_Distances_au2km(au.value);
            mi.value = AstronomyLibs_Distances_km2mi(km.value);
            break;
        default :
            km.value = "error";
            mi.value = "error";
            au.value = "error";
            ly.value = "error";
            pc.value = "error";
    }
}
</script>
<hr>
<p>Uses the following functions:</p>

<ul>
    <li>AstronomyLibs_Distances_distanceBetween</li>
    <li>AstronomyLibs_Location</li>
    <li>AstronomyLibs_Location_Current</li>
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
        var location_a = AstronomyLibs_Location(lat_a.value, lon_a.value);
        var location_b = AstronomyLibs_Location(lat_b.value, lon_b.value);

        var distanceKm = AstronomyLibs_Distances_distanceBetween(location_a, location_b);
        var distanceMi = AstronomyLibs_Distances_km2mi(distanceKm);

        distance.innerHTML = parseInt(distanceKm * 100 + .5) / 100 + " km (" + parseInt(distanceMi * 100 + .5) / 100 + " mi)";
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
<p>Uses the following function:</p>

<ul>
    <li>AstronomyLibs_Distances_calcDistanceAB</li>
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

        distanceab.innerHTML = AstronomyLibs_Distances_calcDistanceAB(parseFloat(distancea.value),
                                                                      parseFloat(distanceb.value),
                                                                      AstronomyLibs_Coordinates_text2float(anglegamma.value));
    }
}
</script>
</article>
</body>
</html>