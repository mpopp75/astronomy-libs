<?php
require_once '../libs-php/Coordinates.php';
use mpopp75\AstronomyLibs as alibs;

if (isset($_POST['float2text'])) {
    $floatCoordinate = (float)$_POST['float2text'];

    $textCoordinate = alibs\Coordinates::float2Text($floatCoordinate);

    print $textCoordinate;
} elseif (isset($_POST['text2float'])) {
    $textCoordinate = $_POST['text2float'];

    $floatCoordinate = alibs\Coordinates::text2Float($textCoordinate);

    if ($floatCoordinate !== false) {
        print $floatCoordinate;
    }
}