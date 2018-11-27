<?php 

function config($index)
{
    $config = include_once '/../config/app.php';

    echo $config[$index];
}