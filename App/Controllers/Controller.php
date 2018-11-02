<?php

namespace App\Controllers;

use Core\View;

class Controller
{
    public function view($view)
    {
        /* passar pra poo */
        return (new View())->getView($view);
    }



}