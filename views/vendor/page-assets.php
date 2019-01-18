<?php

function page_asset($script) {
    if(!isset($_SESSION['page_scripts']))
        $_SESSION['page_scripts'] = [];

    if(!in_array($script, $_SESSION['page_scripts']))
    {
        array_push($_SESSION['page_scripts'], $script);
    }
}

function all_page_assets() {
    if(isset($_SESSION['page_scripts']) && !is_null($_SESSION['page_scripts']))
    {
        $config = include '../config/app.php';
        foreach ($_SESSION['page_scripts'] as $script)
        {
            echo '<script src="'.$config['APP_URL'].'/assets'.$script.'.js"></script>';
        }
    }
    
    $_SESSION['page_scripts'] = NULL;

}