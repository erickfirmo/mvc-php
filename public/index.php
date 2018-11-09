<?php

require_once __DIR__.'/../vendor/autoload.php';

function responder()
{
    return '../views/responder/index.php';
}

session_start();


$route = (new Core\Router());









