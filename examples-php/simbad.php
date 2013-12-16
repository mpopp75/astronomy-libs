<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AstronomyLibs::Simbad Examples (PHP)</title>
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/examples.css">
<link rel="shortcut icon" href="../favicon/moon.png">
<style>
input[type=text]#object {
    width: 200px;
}

div#output {
    max-width: 800px;
    max-height: 500px;
    margin-top: 30px;
    border: 1px solid #CCCCCC;
    background-color: #EFEFEF;
    overflow-x: scroll;
    overflow-y: scroll;
    padding: 5px 10px;
    display: none;
}
</style>
</head>
<body>
<?php include '../page_header.inc.php'; ?>

<h1>Coordinates</h1>

<h2>Namespace: mpopp75\AstronomyLibs</h2>

<p>Uses the following methods:</p>

<ul>
    <li>Simbad->__construct</li>
    <li>Simbad->getOriginalName</li>
    <li>Simbad->getAliases</li>
    <li>Simbad->getCoordinates</li>
    <li>Simbad->getSpectralType</li>
    <li>Simbad->getDistance</li>
    <li>Simbad->getXml</li>
</ul>

Name of object: <input type="text" id="object" name="object" autofocus placeholder="Enter the name of a stellar object" onkeyup="detectEnter(event)">
<br><br>

<button onclick="simbadRequest('fullreply')">Get full reply</button>
<button onclick="simbadRequest('originalname')">Request Original Name</button>
<button onclick="simbadRequest('aliases')">Request Aliases</button>
<button onclick="simbadRequest('coordinates')">Request Coordinates</button>
<button onclick="simbadRequest('spectraltype')">Request Spectral Type</button>
<button onclick="simbadRequest('distance')">Request Distance</button>

<div id="output"></div>

<script>
var object = document.getElementById('object');

var output = document.getElementById('output');

function simbadRequest(request) {
    output.style.display = "block";

    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "../examples-php-ajax/simbad.ajax.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("object=" + object.value + "&request=" + request);
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            output.innerHTML = xmlhttp.responseText;
        }
    }
}

function detectEnter(e) {
    if (e.keyCode == 13) {
       simbadRequest('fullreply')
    }
}
</script>
</body>
</html>