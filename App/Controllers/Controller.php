<?php

namespace App\Controllers;

class Controller
{
    public function view($view)
    {
        /* passar pra poo */

        return '../views/'.$view.'.php';
    }

}