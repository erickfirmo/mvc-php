<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\DividaDoCliente;
use App\Divida;
use App\Cliente;

class DividaDoClienteController extends Controller 
{
    public function add()
    {
        $this->request()->validate([
            'divida_id' => 'required',
            'cliente_id' => 'required'
        ]);
        $cliente = (new Cliente())->find($this->request()->input('cliente_id'));
        $hasDivida = false;
        if($cliente->dividas() != NULL)
        {
            foreach ($cliente->dividas() as $div)
            {
                if($div->id == $this->request()->input('divida_id'))
                {
                    $hasDivida = true;
                }
            }
        }
        if($cliente->dividas() == NULL || $hasDivida == false)
        {
            $this->store();
            $this->alert('success', 'Divida adicionada ao Cliente com sucesso !');
        }
        return $this->route()->back();
    }

    public function store()
    {
        $divida_do_cliente = new DividaDoCliente;
        $divida_do_cliente->divida_id = $this->request()->input('divida_id');
        $divida_do_cliente->cliente_id = $this->request()->input('cliente_id');
        $divida_do_cliente->save();
    }

    public function destroy($id)
    {
         $divida_do_cliente = (new DividaDoCliente())->delete($id);
         $this->alert('success', 'Dívida removida do Cliente com sucesso !');
         return $this->route()->back(); 
    }
}