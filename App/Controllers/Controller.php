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
            return (new View())->getView($view, $values);
        
    }

    public function redirect($route)
    {
        $url = explode('/', $route);

        switch ($url[2]) {

            case 'edit':

                header('location:http://mvc.loc/produto/'.$_SESSION['@id'].'/edit');
                exit();

                break;

            case 'show':


                header('location:http://mvc.loc/produto/'.$_SESSION['@id']);
                exit();

                break;
            case 'edit':

                header('location:http://mvc.loc/produto/'.$_SESSION['@id'].'/edit');
                exit();

                break;
            
            default:
            
                # code...
                break;

        }
        
    }

}