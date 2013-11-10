<?php
require_once '../libs-php/Coordinates.php';
use mpopp75\AstronomyLibs as alibs;

$format   = in_array($_POST['format'], array('symbols', 'spaces', 'dms', 'hms')) ? $_POST['format'] : null;
if ($_POST['decimals'] === "") {
    $decimals = null;
} else {
    $decimals = (int)$_POST['decimals'];
}

if (isset($_POST['float2text'])) {
    $floatCoordinate = (float)$_POST['float2text'];

    if ($decimals === null) {
        $textCoordinate = alibs\Coordinates::float2text($floatCoordinate, $format);
    } else {
        $textCoordinate = alibs\Coordinates::float2text($floatCoordinate, $format, $decimals);
    }

    print $textCoordinate;
} elseif (isset($_POST['text2float'])) {
    $textCoordinate = $_POST['text2float'];

    $floatCoordinate = alibs\Coordinates::text2float($textCoordinate, $decimals);

    if ($floatCoordinate !== false) {
        print $floatCoordinate;
    }
}