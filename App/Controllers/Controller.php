<?php

namespace App\Controllers;

class Controller
{
    public function view($view)
    {
        return header('location:'.$_SESSION['PHP_SELF'].$view.'.php');
    }

}