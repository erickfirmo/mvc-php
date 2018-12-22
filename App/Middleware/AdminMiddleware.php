<?php

namespace App\Middleware;

use User;
use Controller;

class AdminMiddleware {

    public function __construct()
    {
        $this->redirectIfNotAuthenticated();
    }

    public function redirectIfNotAuthenticated()
    {
        if($_SESSION['login@admin'] == NULL || !isset($_SESSION['login@admin']))
        {
            return (new \App\Controllers\Controller())->route()->redirect('/admin/login');   
        }
    }
}