<?php

namespace App\Controllers;

use App\Controllers\Controller;

class HomeController extends Controller 
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return $this->view('/index');
    }
}