<?php

namespace App\Controllers;

use Core\View;

class Controller
{

    public function  __construct()
    {

    }

    public function view($view, $values=0)
    {
            return (new View())->getViewResponse($view, $values);
        
    }

    public function redirect($route)
    {
        $url = explode('/', $route);
        

        switch ($url[2]) {

            case 'edit':
            
                if(defined('PARAMETER'))
                {

                    header('location:http://mvc.loc/'.$url[1].'/'.constant('PARAMETER').'/edit');
                    exit();
                } else {
                    
                    header('location:http://mvc.loc/');
                    exit();
                }



                break;

            case 'show':


                header('location:http://mvc.loc/'.$url[1].'/'.constant('PARAMETER'));
                exit();

                break;

        }
        
    }

}