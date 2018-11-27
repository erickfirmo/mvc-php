<?php

namespace App;

use Core\Model;

class Divida extends Model
{
    public $table = 'dividas';

    public $valor;
    public $vencimento;
    public $cliente_id;

    public $fields = [
        'valor',
        'vencimento',
        'cliente_id'
    ];
}