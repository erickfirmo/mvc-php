<?php

function url($url)
{
    $config = include '../config/app.php';
    echo $config['APP_URL'].$url;
}