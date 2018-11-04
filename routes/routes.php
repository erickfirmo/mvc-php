<?php

/* configurações de rotas */

return array(
    /*'/' => [
        'action' => (new App\Controllers\SiteController())->index(),
        'method' => 'GET'
    ],
    '/home' => [
        'action' => (new App\Controllers\SiteController())->home(),
        'method' => 'GET'
    ],
    '/contato' => [
        'action' => (new App\Controllers\SiteController())->contato(),
        'method' => 'GET'
    ],
    '/enviar' => [
        'action' => (new App\Controllers\SiteController())->enviar(),
        'method' => 'POST'
    ],*/
    
    '/contato' => [
        'action' => 'SiteController@contato',
        'method' => 'GET'
    ],

    '/enviar' => [
        'action' => 'SiteController@enviar',
        'method' => 'POST'
    ],

    
    
);

