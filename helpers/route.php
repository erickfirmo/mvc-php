<?php

function route($routeName)
{
    $route = array_reverse(explode('/', $routeName));
    if($route[0] == 'update' || $route[0] == 'edit' || $route[0] == 'show' || $route[0] == 'destroy')
        echo str_replace($route[0], constant('PARAMETER').'/'.$route[0], $routeName);
    else
        echo $routeName;
}