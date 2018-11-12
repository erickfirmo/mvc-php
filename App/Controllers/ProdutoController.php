<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Produto;

class ProdutoController extends Controller 
{
    public function index()
    {
        $produtos = new Produto;
        $all = $produtos->all();
        return $this->view('/produtos/index',[
            'produtos' => $all
        ]);
    }

    public function create()
    {
        return $this->view('/produtos/create');
    }

    public function store()
    {
        $produto = new Produto();
        $produto->nome = $_POST['nome_produto'];
        $produto->descricao = $_POST['descricao_produto'];
        $produto->preco = $_POST['preco_produto'];
        $produto->save();
        return $this->redirect('/produto/edit');
    }

    public function show($id)
    {
        $produto = new Produto;
        $find = $produto->find($id);
        return $this->view('/produtos/show', [
            'produto' => $find
        ]);
    }

    public function edit($id)
    {   
        $produto = new Produto;
        $find = $produto->find($id);     
        return $this->view('/produtos/edit', [
            'produto' => $find
        ]);
    }

    public function update($id)
    {
        $produto = new Produto;
        $find = $produto->find($id);
        $produto->update([
            'nome' => $_POST['nome_produto'],
            'descricao' => $_POST['descricao_produto'],
            'preco' => $_POST['preco_produto']
            ]);
        return $this->redirect('/produto/edit');
    }

    public function destroy($id)
    {
        $delete = (new Produto())->delete($id);
        return $this->redirect('/produtos');
    }
}