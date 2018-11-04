<?php

namespace Core;

use App\Controllers\Controller;
use Core\View;

class Request
{
    public $nome;

    public function __construct()
    {
        if(isset($_SESSION['REQUEST_FORM']))
        {
            $this->nome = $_SESSION['REQUEST_FORM']['nome'];
        }




    }

    public function get($url)
    {
        return $this->view($url);
    }


    public function post($routeName, $post, $routes)
    {

        $actions = explode('@', $routes[$routeName]['action']);
        $controller = "App\Controllers\\".$actions[0];
        $action = $actions[1];


        return (new $controller())->$action();

        
    }


    public function view($route)
    {
        return (new Controller())->view($route);
    }

    public function action($route)
    {
        return (new Controller())->view($route);
    }

    public function validate($route)
    {
        if(isset($route)){
            return true;
        }
    }


    



    
}