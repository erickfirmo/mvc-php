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
        $this->request()->validate([
            'nome_produto' => 'required|max:20',
            'descricao_produto' => 'datatype:string',
            'preco_produto' => 'required|min:2',
        ]);
        $produto->nome = $this->request()->input('nome_produto');
        $produto->descricao = $this->request()->input('descricao_produto');
        $produto->preco = $this->request()->input('preco_produto');
        $produto->save();
        $this->alert('Produto salvo com sucesso !');
        return $this->route()->redirect('/produto/edit');
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
        $this->request()->validate([
            'nome_produto' => 'required|max:20',
            'descricao_produto' => 'datatype:string',
            'preco_produto' => 'required|min:2',
        ]);
        $produto = new Produto;
        $find = $produto->find($id);
        $produto->update([
            'nome' => $this->request()->input('nome_produto'),
            'descricao' => $this->request()->input('descricao_produto'),
            'preco' => $this->request()->input('preco_produto'),
            ]); 
        $this->alert('Produto atualizado com successo !');
        return $this->route()->redirect('/produto/edit');
    }

    public function destroy($id)
    {
        $delete = (new Produto())->delete($id);
        $this->alert('Produto removido com sucesso !');
        return $this->route()->redirect('/produtos');
    }
}