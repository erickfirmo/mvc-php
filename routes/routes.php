<?php


return array(
    '/' => (new App\Controllers\HomeController())->home(),
    'contato' => (new App\Controllers\SiteController())->index(),
    'home' => (new App\Controllers\SiteController())->index(),
);