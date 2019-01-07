<?php

namespace App;

use Core\Model;

class User extends Model
{
    public $table = 'users';

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;

    public $fields = [
        'name',
        'lastname',
        'email',
        'password',
    ];
}