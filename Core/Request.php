<?php

namespace Core;

use App\Controllers\Controller;
use Core\View;

class Request
{
    public function __construct()
    {
        
    }

    public function getResponse($route)
    {

        if($this->validate($route)){
            

            if($this->getMethod() == 'GET')
            {
                return $this->view($route);
            } elseif($this->getMethod() == 'POST'){

                

            }




        }
    }

    public function view($route)
    {
        return (new Controller())->view($route);
    }

    public function validate($route)
    {
        if(isset($route)){
            return true;
        }
    }

    public function getMethod()
    {

        return $_SERVER['REQUEST_METHOD'];

    }



    
}