<?php

function section($param, $value)
{
    if(!defined('section@'.$param))
    {
        define('section@'.$param, $value);
    }


}