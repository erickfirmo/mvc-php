<?php

require_once __DIR__.'/../vendor/autoload.php';

new DBConnection();

session_start();

$route = (new Core\Router());