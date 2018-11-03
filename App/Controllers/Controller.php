<?php

namespace App\Controllers;

use Core\View;

class Controller
{


    public function  __construct()
    {

    }

    public function view($view)
    {
        /* passar pra poo */
        return (new View())->getView($view);
    }



}


/* methodos globais: view(), route() */