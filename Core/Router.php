<?php

namespace Core;

use App\View;
use App\Controllers\Controller;
use App\Controllers\SiteController;

class Router
{
    public $routes = [];

    public function getRoutes()
    {
        return $this->routes;
    }

    public function setRoutes()
    {
        $this->routes = include_once '../routes/routes.php';
    }
    
    public function get()
    {

        $this->setRoutes();

        $get = str_replace(';', '', $_GET['url']);
        $get = str_replace('index.php/', '', $get);

        if($get == '')
        {

            include '../views/index.php';


        } elseif(!array_key_exists($get, $this->getRoutes())) {

            include '../views/errors/404.php';

        } else {

            foreach($this->getRoutes() as $route => $action)
            {
                if('index.php/'.$route.';' == $_GET['url'])
                {
                    include $action;
                    break;
                }

            }

        }

    }

}
