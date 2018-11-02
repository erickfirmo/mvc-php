<?php

namespace App\Controllers;

use App\Controllers\Controller;

class SiteController extends Controller 
{
    public function index()
    {
        return $this->view('index');
    }


    public function contato()
    {
        return $this->view('contato');
    }
    
}