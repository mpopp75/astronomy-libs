<?php
require_once '../libs-php/_Template.php';
use mpopp75\AstronomyLibs as alibs;

if (isset($_POST['dosomething'])) {
    $in = $_POST['dosomething'];

    print alibs\Template::doSomething($in);
}