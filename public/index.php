<?php

require_once __DIR__.'/../vendor/autoload.php';

require_once __DIR__.'/../helpers/route.php';

function alert()
{
    include __DIR__.'/../views/partials/_alert.php';
}

new DBConnection();

session_start();

$route = (new Core\Router());





