<?php

namespace App;

use Core\Model;
use App\Cliente;
use App\Divida;

class DividaDoCliente extends Model
{
    public $table = 'dividas_dos_clientes';

    public $id;
    public $cliente_id;
    public $divida_id;

    public $fields = [
        'cliente_id',
        'divida_id',
    ];

    public function clientes()
    {
        return $this->belongsTo(new Cliente, 'cliente_id');
    }

    public function dividas()
    {
        return $this->belongsTo(new Divida, 'divida_id');
    }
}