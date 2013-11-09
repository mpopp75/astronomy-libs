<?php
require_once '../libs-php/Distances.php';
use mpopp75\AstronomyLibs as alibs;

$field = in_array($_REQUEST['field'], array("km", "mi", "au", "ly", "pc")) ? $_REQUEST['field'] : null;
$value = (float)$_REQUEST['value'];

$km = 0;
$mi = 0;
$au = 0;
$ly = 0;
$pc = 0;
switch($field) {
    case "km" :
        $km = $value;
        $mi = alibs\Distances::km2mi($km);
        $au = alibs\Distances::km2au($km);
        $ly = alibs\Distances::au2ly($au);
        $pc = alibs\Distances::ly2pc($ly);
        break;
    case "mi" :
        $mi = $value;
        $km = alibs\Distances::mi2km($mi);
        $au = alibs\Distances::km2au($km);
        $ly = alibs\Distances::au2ly($au);
        $pc = alibs\Distances::ly2pc($ly);
        break;
    case "au" :
        $au = $value;
        $ly = alibs\Distances::au2ly($au);
        $pc = alibs\Distances::ly2pc($ly);
        $km = alibs\Distances::au2km($au);
        $mi = alibs\Distances::km2mi($km);
        break;
    case "ly" :
        $ly = $value;
        $pc = alibs\Distances::ly2pc($ly);
        $au = alibs\Distances::ly2au($ly);
        $km = alibs\Distances::au2km($au);
        $mi = alibs\Distances::km2mi($km);
        break;
    case "pc" :
        $pc = $value;
        $ly = alibs\Distances::pc2ly($pc);
        $au = alibs\Distances::ly2au($ly);
        $km = alibs\Distances::au2km($au);
        $mi = alibs\Distances::km2mi($km);
        break;
    default :
        print "error";
        exit;
}

// send resonse back as JSON string
print json_encode(array("km" => $km,
                        "mi" => $mi,
                        "au" => $au,
                        "ly" => $ly,
                        "pc" => $pc));