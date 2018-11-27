<?php

function section($param, $value=NULL)
{
    if($value == NULL)
        echo constant('section@'.$param);
    elseif(!defined('section@'.$param))
        define('section@'.$param, $value);
}