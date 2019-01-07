<?php

namespace Core;

use Core\View;

class Router
{
    protected $routes = [];
    protected $root = '/';
    protected $name;
    protected $url;
    protected $action;
    protected $namespace = 'App\Controllers\\';
    protected $parameter;
    protected $parameterIndex;
    protected $config;
    
    public function __construct()
    {
        $this->setRoutes();
        $this->setUrl();
        $this->setName();
        $this->setConfig();

        if($this->hasParameter())
            $this->setParameter($this->getParameterIndex()); 
        if($this->validate())
        {   $this->setAction();
            if($this->requestMethod() != $this->getMethod())
                include '../views/errors/404.php';
            else
                $response = $this->render($this->getAction());
        }else{
            include '../views/errors/404.php';
        }
    }

    protected function render($action)
    {
        $actions = explode('@', $action);
        $controller = $this->getNamespace().$actions[0];
        $method = $actions[1];
        if($this->hasParameter())
            (new $controller())->$method($this->getParameter());
        elseif(!is_numeric($this->getUrlParam(0)))
            (new $controller())->$method();
    }

    protected function setRoutes()
    {
        $this->routes = include_once '../routes/routes.php';
    }

    protected function getRoutes()
    {
        return $this->routes;
    }

    protected function setUrl()
    {
        $url = $_SERVER['REQUEST_URI'];
        if(substr($url,-1) == '/')
        {
            $url = substr_replace($url,"",-1);
        }
         
        $this->url = array_reverse(explode('/', $url));
    }

    protected function getUrl()
    {
        return $this->url;
    }

    protected function validate()
    {
        $name = $this->getName();
        $routeName = str_replace($this->getParameter(),'$id', $name);

        return (array_key_exists($routeName.'/', $this->getRoutes()) || array_key_exists($routeName, $this->getRoutes())) ? true : false;
    }
    
    protected function hasParameter()
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

    protected function setParameter($parameterIndex)
    {
        $this->parameter = $this->getUrlParam($parameterIndex);
        $_SESSION['PARAMETER'] = $this->parameter;
    }

    protected function getParameter()
    {
        return $this->parameter;
    }

    protected function setParameterIndex($parameterIndex)
    {
        $this->parameterIndex = $parameterIndex;
    }

    protected function getParameterIndex()
    {
        return $this->parameterIndex;
    }

    protected function setAction()
    {
        $name = str_replace($this->getParameter(), '$id', $this->getName());
        $routeName = substr($name, -1) != '/' ? $name.'/' : $name;
        $this->action = $this->getRoutes()[$routeName]['action'];
    }

    protected function getAction()
    {
        return $this->action;
    }

    protected function setName()
    {
        $params = strstr($this->getUrlParam(0), 'page=');
        $pageParam = explode('=', $params);
        if(isset($pageParam[1]))
        {
            if(is_numeric($pageParam[1]) && is_numeric(substr($_SERVER['REQUEST_URI'], -1)))
            {
                    $name = str_replace('?page='.$pageParam[1], '', $_SERVER['REQUEST_URI']);
                    $_SESSION['PAGE'] = $pageParam[1];
            }

        } else {
            $_SESSION['PAGE'] = 1;
            $name = $_SERVER['REQUEST_URI'];
        }
        
        $this->name = $name;
    }

    protected function getName()
    {
        return $this->name;
    }

    protected function getNamespace()
    {
        return $this->namespace;
    }

    protected function requestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    protected function getMethod()
    {
        $name = str_replace($this->getParameter(), '$id', $this->getName());
        $routeName = substr($name, -1) != '/' ? $name.'/' : $name;
        return $this->getRoutes()[$routeName]['method'];
    }

    protected function getUrlParam($i)
    {
        if(isset($this->url[$i]))
            return $this->url[$i];
        elseif(isset($this->url[--$i]) && count($this->url) >= $i)
            return $this->url[$i];
        elseif(isset($this->url[--$i]) && count($this->url) >= $i)
            return $this->url[$i];
        else
            return false;
    }

    protected function getRoot()
    {
        return $this->root;
    }

    public function setConfig()
    {
        $this->config = (include '../config/app.php');
    }

    public function getConfig($index)
    {
        return $this->config[$index];
    }

    public function redirect($route)
    {
        $url = array_reverse(explode('/', $route));
        if($url[0] == 'edit')
        {
            $redirect = '/'.$url[1].'/'.$_SESSION['PARAMETER'].'/edit';
        } elseif($url[0] == 'show') {
            $redirect = '/'.$url[1].'/'.$_SESSION['PARAMETER'];
        } else {
            $redirect = $route;
        }
        header('location:'.$this->getConfig('APP_URL').$redirect);
        exit();
    }

    public function back()
    {
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
    }
}
