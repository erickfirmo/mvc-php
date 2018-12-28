<?php

namespace App;

use Core\Model;
use App\Divida;
use App\Cliente;
use App\DividaDoCliente;

class Divida extends Model
{
    public $table = 'dividas';

    public $id;
    public $valor;
    public $vencimento;
    public $fields = [
        'valor',
        'vencimento',
    ];

    public function clientes()
    {
        return $this->belongsToMany(new Cliente, new DividaDoCliente, 'divida_id', 'cliente_id');
    }
}