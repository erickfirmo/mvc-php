<?php

require_once __DIR__.'/../vendor/autoload.php';

new DBConnection();

function responder()
{
    return '../views/engines/responder.php';
}

session_start();


$route = (new Core\Router());





