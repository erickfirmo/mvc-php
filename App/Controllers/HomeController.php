<?php

namespace App\Controllers;

use App\Controllers\Controller;

class HomeController extends Controller 
{
    public function index()
    {
        return $this->view('home');
    }

    
}