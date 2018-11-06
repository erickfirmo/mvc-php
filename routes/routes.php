<?php

/* configurações de rotas */

return array(
    '/' => [
        'action' => 'SiteController@index',
        'method' => 'GET'
    ],
    
    '/contato' => [
        'action' => 'SiteController@contato',
        'method' => 'GET'
    ],

    '/produto/create' => [
        'action' => 'ProdutoController@create',
        'method' => 'GET'
    ],

    '/produto/store' => [
        'action' => 'ProdutoController@store',
        'method' => 'POST'
    ],

    '/produto/$id/edit' => [
        'action' => 'ProdutoController@edit',
        'method' => 'GET'
    ],

    '/produto/$id/update' => [
        'action' => 'ProdutoController@update',
        'method' => 'POST'
    ],

    '/produto/$id/destroy' => [
        'action' => 'ProdutoController@destroy',
        'method' => 'POST'
    ],

    '/produto/$id' => [
        'action' => 'ProdutoController@show',
        'method' => 'GET'
    ],

    '/produto' => [
        'action' => 'ProdutoController@index',
        'method' => 'GET'
    ],


    
    
);

