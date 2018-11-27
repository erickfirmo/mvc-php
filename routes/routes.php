<?php

/* configurações de rotas */


return [

    '/' => [
        'action' => 'HomeController@index',
        'method' => 'GET'
    ],

    '/clientes/' => [
        'action' => 'ClienteController@index',
        'method' => 'GET'
    ],
    
    '/clientes/create/' => [
        'action' => 'ClienteController@create',
        'method' => 'GET'
    ],
    
    '/clientes/store/' => [
        'action' => 'ClienteController@store',
        'method' => 'POST'
    ],

    '/clientes/$id/' => [
        'action' => 'ClienteController@show',
        'method' => 'GET'
    ],

    '/clientes/$id/edit/' => [
        'action' => 'ClienteController@edit',
        'method' => 'GET'
    ],

    '/clientes/$id/update/' => [
        'action' => 'ClienteController@update',
        'method' => 'POST'
    ],

    '/clientes/$id/destroy/' => [
        'action' => 'ClienteController@destroy',
        'method' => 'POST'
    ],


    
    '/dividas/' => [
        'action' => 'DividaController@index',
        'method' => 'GET'
    ],
    
    '/dividas/create/' => [
        'action' => 'DividaController@create',
        'method' => 'GET'
    ],
    
    '/dividas/store/' => [
        'action' => 'DividaController@store',
        'method' => 'POST'
    ],

    '/dividas/$id/' => [
        'action' => 'DividaController@show',
        'method' => 'GET'
    ],

    '/dividas/$id/edit/' => [
        'action' => 'DividaController@edit',
        'method' => 'GET'
    ],

    '/dividas/$id/update/' => [
        'action' => 'DividaController@update',
        'method' => 'POST'
    ],

    '/dividas/$id/destroy/' => [
        'action' => 'DividaController@destroy',
        'method' => 'POST'
    ],
    

    
];

