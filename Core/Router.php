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
        
        if($this->getMethod() == 'GET')
        {

            include $this->getResponse();


        } elseif($this->getMethod() == 'POST'){
            $a = $this->getResponse();

        }
    }

    public function getResponse()
    {
        /* request  */
        return $this->request($this->getUrl());
    }


    public function request($url)
    {  
        if(!$this->validate($url)) {

            return $this->getError('404');

        } elseif($this->validate($url) && $url == $this->getRoot()) {

            return (new Request())->get('index');

        } else {

            if($this->getMethod() == 'GET')
            {

                return (new Request())->get($url);


            } elseif($this->getMethod() == 'POST'){

                return $action = (new Request())->post($url, $_POST, $this->getRoutes());


            }

        }
    }

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function validate($url)
    {
        ## return isset($url) && array_key_exists($url, $this->getRoutes()) ? true : false;
        return true;
    
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
    }

}
