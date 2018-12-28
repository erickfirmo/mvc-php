<?php

function auth($attr)
{
    $obj = $_SESSION['login@admin'];
    echo $obj->$attr.' ';
}

?>