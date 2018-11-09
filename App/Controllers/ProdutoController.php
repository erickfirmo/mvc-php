<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Produto;

class ProdutoController extends Controller 
{
    public function index()
    {
        $produtos = (new Produto())->all();
        
        return $this->view('/produto/index',[
            'produtos' => $produtos
        ]);
    }


    

    public function create()
    {
        return $this->view('/produto/create');
    }


    public function store()
    {
        $produto = new Produto();
        $produto->nome = $_POST['nome'];
        $produto->descricao = $_POST['descricao'];
        $produto->save();

        return $this->redirect('/produto/edit');
    }


    public function show($id)
    {
        define('PARAMETER', $id);

        $produto = (new Produto())->find($id);


        return $this->view('/produto/show', [
            'produto' => $produto
        ]);
    }





    public function edit($id)
    {
        
        $produto = 'nome';

        return $this->view('/produto/edit', [
            'produto' => $produto
        ]);
    }





    public function update($id)
    {
        /*atualiza @id na model
        $produto = (new Produto())->find($id);
        
        $produto->nome = $_POST['nome'];

        $produto->descricao = $_POST['descricao'];

        $produto->update();*/

        
        return $this->redirect('/produto/edit');


    }

    
}