<?php

namespace App;

use Core\Model;
use App\User;

class Admin extends Model
{
    public $table = 'admins';

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