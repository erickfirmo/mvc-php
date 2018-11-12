<?php

namespace App\Controllers;

use Core\View;

class Controller
{
    public function  __construct()
    {

    }

    public function view($view, $values=0)
    {
        return (new View())->getViewResponse($view, $values);
    }

    public function redirect($route)
    {
        $url = array_reverse(explode('/', $route));
        if(defined('PARAMETER'))
        {
            if($url[0] == 'edit')
            {
                $redirect = '/'.$url[1].'/'.constant('PARAMETER').'/edit';
            } elseif($url[0] == 'show') {
                $redirect = '/'.$url[1].'/'.constant('PARAMETER');
            }
        }else{
            $redirect = $route;
        }

        header('location:http://mvc.loc'.$redirect);
            exit();
    }
}