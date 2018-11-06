<?php

namespace App\Controllers;

use App\Controllers\Controller;

class SiteController extends Controller 
{
    public function index()
    {
        return $this->view('/index');
    }

    public function contato()
    {
        return $this->view('/contato');
    }

    public function home()
    {
        return $this->view('/home');
    }

    public function enviar()
    {

        $_SESSION['teste'] = $_POST['nome'];

        header('location: http://mvc.loc/contato');
		exit(); 
    }

    public function redirect($route)
    {

        
        header('location: http://mvc.loc/teste');
		exit();
    }
    
}