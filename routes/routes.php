<?php

/* configurações de rotas */

return [

    '/' => [
        'action' => 'HomeController@index',
        'method' => 'GET'
    ],

    // authentication routes

    '/login/' => [
        'action' => 'Auth\UserController@showLoginForm',
        'method' => 'GET'
    ],

    '/admin/login/' => [
        'action' => 'Auth\AdminController@showLoginForm',
        'method' => 'GET'
    ],

    '/register/' => [
        'action' => 'Auth\UserController@showRegisterForm',
        'method' => 'GET'
    ],

    '/admin/register/' => [
        'action' => 'Auth\AdminController@showRegisterForm',
        'method' => 'GET'
    ],

    '/auth/register/' => [
        'action' => 'Auth\UserController@register',
        'method' => 'POST'
    ],

    '/auth/admin/register/' => [
        'action' => 'Auth\AdminController@register',
        'method' => 'POST'
    ],

    '/auth/login/' => [
        'action' => 'Auth\UserController@login',
        'method' => 'POST'
    ],
    
    '/auth/admin/login/' => [
        'action' => 'Auth\AdminController@login',
        'method' => 'POST'
    ],

    '/auth/logout/' => [
        'action' => 'Auth\UserController@logout',
        'method' => 'POST'
    ],

    '/auth/admin/logout/' => [
        'action' => 'Auth\AdminController@logout',
        'method' => 'POST'
    ],
];

