<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Divida;
use App\Cliente;
use App\DividaDoCliente;

class DividaController extends Controller 
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $dividas = (new Divida())->all();
        return $this->view('/dividas/index', [
            'dividas' => $dividas
        ]);
    }

    public function create()
    {
        $clientes = (new Cliente())->all();
        return $this->view('/dividas/create');
    }

    public function store()
    {
        $divida = new Divida;
        $divida->valor = $this->request()->input('valor');
        $divida->vencimento = $this->request()->input('vencimento');
        $divida->save();
        $this->alert('success', 'Dívida cadastrada com sucesso !');
        return $this->route()->redirect('/dividas/edit');
    }

    public function edit($id)
    {
        $divida = (new Divida())->find($id);
        $clientes = (new Cliente())->all();
        return $this->view('/dividas/edit', [
            'divida' => $divida,
            'clientes' => $clientes
        ]);
    }

    public function show($id)
    {
        $divida = (new Divida())->find($id);
        return $this->view('/dividas/show', [
            'divida' => $divida
        ]);
    }

    public function update($id)
    {
        $valor = $this->request()->input('valor');
        $vencimento = $this->request()->input('vencimento');
        $divida = (new Divida())->find($id);
        $divida->update([
            'valor' => $valor,
            'vencimento' => $vencimento
        ]);
        $this->alert('success', 'Dívida atualizada com sucesso !');
        return $this->route()->redirect('/dividas/edit');
    }

    public function destroy($id)
    {
        $delete = (new Divida())->delete($id);
        $this->alert('success', 'Dívida removida com sucesso !');
        return $this->route()->redirect('/dividas');
    }
}