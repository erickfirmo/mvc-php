<?php

namespace App\Controllers;

use Core\Request;
use Core\View;
use Core\Router;

class Controller
{
    public $config;

    public function  __construct()
    {
        $this->config = include '../config/app.php';
    }

    public function view($view, $values=0)
    {
        return (new View())->getViewResponse($view, $values);
    }

    public function request()
    {
        return new Request;
    }

    public function route()
    {
        return new Router;
    }

    public function alert($status, $alert)
    {
        return (new View())->alert($status, $alert);
    }

}