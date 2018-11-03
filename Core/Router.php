<?php

namespace Core;

use Core\View;
use Core\Request;
use App\Controllers\Controller;
use App\Controllers\SiteController;

class Router
{
    public $routes = [];
    public $root = '/';

    public function __construct()
    {
        $this->setRoutes();
       
        include $this->request();
        
    }

    public function request()
    {

        if($this->validate($this->getUrl()) && $this->getUrl() != $this->getRoot())
        {
            $response = (new Request())->getResponse($this->getUrl());
            
        } elseif($this->validate($this->getUrl()) && $this->getUrl() == $this->getRoot()) {
            $response = (new Request())->getResponse('index');
        }else {
            $response = $this->getError('404');
        }

        /* resquest  */
        return $response;
    }
    
    public function validate($routeName)
    {
        return array_key_exists($routeName, $this->getRoutes());

    }

    

    public function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
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

    public function getError($error)
    {
        return (new View())->getView('errors/'.$error);
        /*precisa vevificar se arquivo existe */
    }

}
