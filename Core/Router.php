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
        
        if($this->hasParameter())
        {
            $this->setParameter($this->getParameterIndex());
        }

        $this->setName();
        
        if($this->validate())
        {
            $this->setAction();
            include $this->render($this->getAction());
        } else {
            include $this->getError('404');
        }
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
        return $this->name;
    }

    

    public function render($action)
    {
        $actions = explode('@', $action);
        $c = "App\Controllers\\".$actions[0];

        $a = $actions[1];

        //validar se getName existe no array, else return getError
            //methodo que retorna tipo no final
        
            if($this->hasParameter())
            {
                if(is_numeric($this->getUrlParam(0)))
                {
                    $a = 'show';
                } elseif($this->getUrlParam(0) == 'edit') {
                    $a = 'edit';
                } elseif($this->getUrlParam(0) == 'update') {
                    $a = 'update';
                } elseif($this->getUrlParam(0) == 'destroy') {
                    $a = 'destroy';
                } 

                
                return (new $c())->$a($this->getParameter());

            } elseif(!is_numeric($this->getUrlParam(0)) && $this->getName() != '/') {

                
                return (new $c())->$a();

            } elseif($this->getName() == '/') {

                $a = 'index';
                
            }

            return (new $c())->$a();
        
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setAction(){
        $this->action = $this->getRoutes()[$this->getName()]['action'];
    }

    public function setName()
    {
        if(!$this->hasParameter())
        {
            $this->name = $_SERVER['REQUEST_URI'];
        } else {
            $this->name = str_replace($this->getParameter(), '$id', $_SERVER['REQUEST_URI']);
        }
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

    public function validate()
    {
        return array_key_exists($this->getName(), $this->getRoutes()) ? true : false;
       
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
        return (new View())->getView('/errors//'.$error);
    }

}
