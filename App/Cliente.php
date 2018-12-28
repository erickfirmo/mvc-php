<?php

namespace App;

use Core\Model;
use App\Divida;
use App\DividaDoCliente;

class Cliente extends Model
{
    public $table = 'clientes';

    public $id;
    public $nome;
    public $sobrenome;
    public $nascimento;
    public $rg;
    public $cpf;
    public $sexo;

    public $fields = [
        'nome',
        'sobrenome',
        'nascimento',
        'rg',
        'cpf',
        'sexo',
    ];

    public function dividas()
    {
        return $this->belongsToMany(new Divida, new DividaDoCliente, 'cliente_id', 'divida_id');
    }
}