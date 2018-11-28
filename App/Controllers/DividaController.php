<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Divida;
use App\Cliente;

class DividaController extends Controller 
{
    public function index()
    {
        $dividas = (new Divida())->paginate(2)->all();
        return $this->view('/dividas/index', [
            'dividas' => $dividas
        ]);
    }

    public function create()
    {
        $clientes = (new Cliente())->all();
        return $this->view('/dividas/create', [
            'clientes' => $clientes

        ]);
    }

    public function store()
    {
        $divida = new Divida;

        $divida->valor = $this->request()->input('valor');
        $divida->vencimento = $this->request()->input('vencimento');
        $divida->cliente_id = $this->request()->input('cliente_id');
        $divida->save();

        $this->alert('Dívida cadastrada com sucesso !');
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

        return $this->view('/dividas/edit', [
            'divida' => $divida
        ]);

    }

    public function update($id)
    {
        $valor = $this->request()->input('valor');
        $vencimento = $this->request()->input('vencimento');
        $cliente_id = $this->request()->input('cliente_id');

        $divida = (new Divida())->update($id, [
            'valor' => $valor,
            'vencimento' => $vencimento,
            'cliente_id' => $cliente_id
        ]);
        
        $this->alert('Dívida atualizada com sucesso !');
        return $this->route()->redirect('/dividas/edit');
    }

    public function destroy($id)
    {
        $delete = (new Divida())->delete($id);
    }

    
}