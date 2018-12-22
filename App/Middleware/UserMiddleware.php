<?php

namespace App\Middleware;

use User;
use Controller;

class UserMiddleware {

    public function __construct()
    {
        $this->redirectIfNotAuthenticated();
    }

    public function redirectIfNotAuthenticated()
    {
        if($_SESSION['login@user'] == NULL || !isset($_SESSION['login@user']))
        {
            return (new \App\Controllers\Controller())->route()->redirect('/login');   
        }
    }
}