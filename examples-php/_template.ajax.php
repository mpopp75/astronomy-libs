<?php
require_once '../libs-php/_Template.php';
use mpopp75\AstronomyLibs as alibs;

if (isset($_POST['dosomething'])) {
    $in = $_POST['dosomething'];

    $out = $floatCoordinate = alibs\Template::doSomething($in);

    print $out;
}