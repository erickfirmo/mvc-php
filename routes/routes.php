<?php

/* configurações de rotas */


return [
    '/' => 'SiteController@index',
    
    '/contato/' => 'SiteController@contato',

    '/produto/create/' => 'ProdutoController@create',

    '/produto/store/' => 'ProdutoController@store',
    
    '/produto/$id/edit/' => 'ProdutoController@edit',
        
    '/produto/$id/edit' => 'ProdutoController@edit',

    '/produto/$id/update/' => 'ProdutoController@update',

    '/produto/$id/destroy/' => 'ProdutoController@destroy',

    '/produto/$id/' => 'ProdutoController@show',

    '/produtos/' => 'ProdutoController@index',

];

