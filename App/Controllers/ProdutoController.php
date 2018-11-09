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
        
        $produto = 'FIND OR FAIL';

        //retorna view erro se não achar registro pelo $id


        return $this->view('/produto/show', [
            'produto' => $produto
        ]);
    }





    public function edit($id)
    {
        $produto = 'FIND OR FAIL';

        //retorna view erro se não achar registro pelo $id

        return $this->view('/produto/edit', [
            'produto' => $produto
        ]);
    }





    public function update($id)
    {
        
        $produto = new Produto();
        $produto->nome = $_POST['nome'];
        $produto->descricao = $_POST['descricao'];
        $produto->update();

        
        return $this->redirect('/produto/edit');


    }

    
}