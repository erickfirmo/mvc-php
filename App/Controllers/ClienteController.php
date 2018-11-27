<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Cliente;

class ClienteController extends Controller 
{
    public function index()
    {
        $clientes = (new Cliente())->paginate(2)->all();
        
        return $this->view('/clientes/index', [
            'clientes' => $clientes
        ]); 
    }

    public function create()
    {
        return $this->view('/clientes/create');
    }

    public function store()
    {
        $this->request()->validate([
            'nome' => 'required|max:20',
            'sobrenome' => 'required|max:100',
            'nascimento' => 'required',
            'rg' => 'required',
            'cpf' => 'required',
            'sexo' => 'required'
        ]);

        $cliente = new Cliente;
        $cliente->nome = $this->request()->input('nome');
        $cliente->sobrenome = $this->request()->input('sobrenome');
        $cliente->nascimento = $this->request()->input('nascimento');
        $cliente->rg = $this->request()->input('rg');
        $cliente->cpf = $this->request()->input('cpf');
        $cliente->sexo = $this->request()->input('sexo');
        $cliente->save();

        $this->alert('Cliente salvo com sucesso');
        return $this->route()->redirect('/clientes/edit');
    }

    public function edit($id)
    {
        $cliente = (new Cliente())->find($id);
        
        return $this->view('/clientes/edit', [
            'cliente' => $cliente
        ]);
    
    }

    public function show($id)
    {
        $cliente = (new Cliente())->find($id);
        return $this->view('/clientes/show', [
            'cliente' => $cliente
        ]);
    
    }

    public function update($id)
    {

        $c = new Cliente;
        $cliente = $c->find($id);

        $nome = $this->request()->input('nome');
        $sobrenome = $this->request()->input('sobrenome');
        $nascimento = $this->request()->input('nascimento');
        $rg = $this->request()->input('rg');
        $cpf = $this->request()->input('cpf');
        $sexo = $this->request()->input('sexo');

        $cliente = (new Cliente())->update([
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'nascimento' => $nascimento,
            'rg' => $rg,
            'cpf' => $cpf,
            'sexo' => $sexo
        ]);

        $this->alert('Cliente atualizado com sucesso !');
        $this->route()->redirect('/clientes/edit');

    }

    public function destroy($id)
    {
        $cliente = (new Cliente())->delete($id);
        $this->alert('Cliente removido com sucesso !');
        $this->route()->redirect('/clientes/index');
    }


    

    
}