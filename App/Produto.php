<?php

namespace App;

use Core\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    
    public $nome;
    public $descricao;
    public $preco;

    protected $fields = [
        'nome',
        'descricao',
        'preco'
    ];
}