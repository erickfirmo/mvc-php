<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Produto;

class ProdutoController extends Controller 
{
    public function index()
    {
        return $this->view('/produto/index');
    }

    public function create()
    {
        return $this->view('/produto/create');
    }


    public function store()
    {
        $this->redirect('/produto');
    }

    public function show($id)
    {
        echo $id;
        return $this->view('/produto/show');
    }



    public function edit($id)
    {
        echo $id;
        return $this->view('/produto/edit');
    }

    public function update($id)
    {
        $_SESSION['produto'] = $_POST['produto'];

        $this->redirect('/produto');
    }

    
    public function redirect($route)
    {
        return header('location: http://mvc.loc'.$route);
		exit();
    }

    /* public function home()
    {
        return $this->view('home');
    }

    public function show()
    {
        $_SESSION['nome'] = 'desafio';

        header('location: http://mvc.loc/contato');
		exit(); 
    }*/



    
}