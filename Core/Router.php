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
        //
        /*if(!isset($_SESSION['request@url']))
        {
            
            $_SESSION['request@url'] = $_SERVER['REQUEST_URI'];
            

        } elseif($_SESSION['request@url'] == 'NULL') {
            if($this->validate())
            {
                
                $_SESSION['request@url'] = $_SERVER['REQUEST_URI'];
             

            } else {
                $_SESSION['request@view'] = '404';
            }

        }*/

        

        
        



        if($this->validate())
        {
            $this->setAction();
            //
            /*if(!isset($_SESSION['request@action']) && !isset($_SESSION['request@view']))
            {
                $_SESSION['request@action'] = true;
                $_SESSION['request@view'] = false;
            }

            if($_SESSION['request@view'] && !$_SESSION['request@action'])
            {*/
                $this->render($this->getAction());



            /*    $_SESSION['request@view'] = false;
                $_SESSION['request@action'] = true;

            } elseif($_SESSION['request@action'] && !$_SESSION['request@view']) {
                $this->render($this->getAction());

            }*/

        } else {
            include '../views/errors/404.php';


            
        }

    }



    public function validate()
    {

        $name = $this->getName();


        $routeName = str_replace($this->getParameter(),'$id', $name);

        $_SESSION['request@route'] = $routeName;

        $_SESSION['validate'] = array_key_exists($routeName, $this->getRoutes());
        


    

        return array_key_exists($routeName.'/', $this->getRoutes()) || array_key_exists($routeName, $this->getRoutes()) ? true : false;
         
            
        



        //return true;

       
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
        $name = str_replace($this->getParameter(), '$id', $this->getName());

        $routeName = substr($name, -1) != '/' ? $name.'/' : $name;


        $this->action = $this->getRoutes()[$routeName]['action'];
    }

    /*public function setName()
    {

        
            $name = $_SERVER['REQUEST_URI'];
        
            
        if(!$this->hasParameter())
        {
            $this->name = $name;



        } else {
            $this->name = $name;
        }
    }*/

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
        return (new View())->getView('/errors//'.$error);
    }

}
