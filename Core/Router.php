<?php

namespace Core;

use Core\View;
use App\Controllers\Controller;
use App\Controllers\SiteController;

class Router
{
    public $routes = [];
    public $root = '/';

    public function __construct()
    {
        $this->setRoutes();

        if($this->validate($_GET['url']) == 'index.php/;') {
            $this->get();
        } else {
            $this->root();
        }
    }

    public function setRoutes()
    {
        $this->routes = include_once '../routes/routes.php';
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function get()
    {

        $get = str_replace(';', '', $_GET['url']);
        $get = str_replace('index.php/', '', $get);

        if($get == NULL)
        {
            include_once (new View())->getView('index');

        } elseif(!array_key_exists($get, $this->getRoutes())) {

            include_once $this->getError();
        } else {
            include_once $this->getRoutes()[$get];
        }

    }

    public function validate($get)
    {
        return isset($get);
    }


    public function getError()
    {
        return (new View())->getView('errors/404');
    }

}
