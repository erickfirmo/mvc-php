<?php

return array(
    'home' => (new App\Controllers\HomeController())->index(),
    'contato' => (new App\Controllers\SiteController())->contato(),

);