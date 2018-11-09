<?php

namespace Core;

use Core\View;



class Router
{
    public $routes = [];
    public $root = '/';
    public $name;
    public $url;
    public $action;
    public $namespace = 'App\Controllers\\';
    public $parameter;
    public $parameterIndex;

    public function __construct()
    {

        $this->setRoutes();

        $this->setUrl();
        //r
        if($this->hasParameter())
        {
            $this->setParameter($this->getParameterIndex());
        }
        

        if($this->validate())
        {
    
            //executa método do controller e dá include na view      
            $this->setAction();

            $resquest = $this->render($this->getAction());


        } else {
            
            include '../views/errors/404.php';

        }




    }


    public function render($action)
    {
        $actions = explode('@', $action);
        $controller = "App\Controllers\\".$actions[0];
        $method = $actions[1];
        
        if($this->hasParameter())
        {
            
            
            (new $controller())->$method($this->getParameter());
        } elseif(!is_numeric($this->getUrlParam(0))) {

                

                (new $controller())->$method();
    
            

        } 


       
    }


    public function validate()
    {
        $name = $this->getName();
        $routeName = str_replace($this->getParameter(),'$id', $name);
        return (array_key_exists($routeName.'/', $this->getRoutes()) || array_key_exists($routeName, $this->getRoutes())) || $routeName == '/request' ? true : false;
    }

    public function setParameter($parameterIndex){
        $this->parameter = $this->getUrlParam($parameterIndex);
    }

    public function getParameter()
    {
        return $this->parameter;
    }

    public function hasParameter()
    {
        if(is_numeric($this->getUrlParam(0))) {
            $this->setParameterIndex(0);
            return true;
            
        } elseif(is_numeric($this->getUrlParam(1))) {
            $this->setParameterIndex(1);
            return true;
            
        } elseif(is_numeric($this->getUrlParam(2))) {
            $this->setParameterIndex(2);
            return true;
            
        } else {
            return false;
        }
    }

    public function setParameterIndex($parameterIndex)
    {
        $this->parameterIndex = $parameterIndex;
    }

    public function getParameterIndex()
    {
        return $this->parameterIndex;
    }

    public function getName()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setAction(){
        $name = str_replace($this->getParameter(), '$id', $this->getName());
        $routeName = substr($name, -1) != '/' ? $name.'/' : $name;
        $this->action = $this->getRoutes()[$routeName]['action'];
    }

    public function setMethod()
    {
        if($this->getRoutes()[$this->getName()]['method'] == $this->requestMethod())
        {
            $this->method = $this->requestMethod();
        }
    }

    public function requestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getUrlParam($i)
    {
        if(isset($this->url[$i]))
        {
            return $this->url[$i];
        } elseif(isset($this->url[--$i]) && count($this->url) >= $i) {
            return $this->url[$i];
        } elseif(isset($this->url[--$i]) && count($this->url) >= $i) {
            return $this->url[$i];
        } else {
            return false;
        }
    }

    public function setUrl()
    {
        $url = $_SERVER['REQUEST_URI'];
        if(substr($url,-1) == '/')
        {
            $url = substr_replace($url,"",-1);
        };
        $this->url = array_reverse(explode('/', ($url)));
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
        return (new View())->getView('/errors/'.$error);
    }

}
