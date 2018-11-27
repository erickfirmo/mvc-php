<?php

namespace App;

use Core\Model;

class Cliente extends Model
{
    public $table = 'clientes';

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
        'sexo'
    ];
}