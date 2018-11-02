<?php

namespace App\Controllers;

use App\Controllers\Controller;

class HomeController extends Controller 
{
    public function home()
    {
        return $this->view('home');
    }

    
}