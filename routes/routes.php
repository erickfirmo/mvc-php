<?php

/* configurações de rotas */

/*function route($name, $action ,$method)
{
        return $name => [
            'action' => $action,
            'method' => $method,
        ],


}*/


/*return array(
    route('/', 'SiteController@index', 'GET'),
    route('/contato', 'SiteController@contato', 'GET'),
    route('/produto/create', 'ProdutoController@create', 'GET'),
    route('/produto/store', 'ProdutoController@store', 'POST'),
    route('/produto/$id/edit', 'ProdutoController@index', 'GET'),
    route('/produto/$id/update', 'ProdutoController@update', 'POST'),
    route('/produto/$id/destroy', 'ProdutoController@destroy', 'POST'),
    route('/produto/$id', 'ProdutoController@show', 'GET'),
    route('/produto', 'ProdutoController@index', 'GET'),





    

);*/




return array(
    '/' => [
        'action' => 'SiteController@index',
        'method' => 'GET'
    ],
    
    '/contato/' => [
        'action' => 'SiteController@contato',
        'method' => 'GET'
    ],

    '/produto/create/' => [
        'action' => 'ProdutoController@create',
        'method' => 'GET'
    ],

    '/produto/store/' => [
        'action' => 'ProdutoController@store',
        'method' => 'POST'
    ],

    '/produto/$id/edit/' => [
        'action' => 'ProdutoController@edit',
        'method' => 'GET'
    ],
    '/produto/$id/edit' => [
        'action' => 'ProdutoController@edit',
        'method' => 'GET'
    ],

    '/produto/$id/update/' => [
        'action' => 'ProdutoController@update',
        'method' => 'POST'
    ],

    '/produto/$id/destroy/' => [
        'action' => 'ProdutoController@destroy',
        'method' => 'POST'
    ],

    '/produto/$id/' => [
        'action' => 'ProdutoController@show',
        'method' => 'GET'
    ],

    '/produto/' => [
        'action' => 'ProdutoController@index',
        'method' => 'GET'
    ],


    
    
);

