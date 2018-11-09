<?php

namespace Core;


class View
{
    public function getView($view, $values=0)
    {
        
        $_SESSION['content@response'] = $values;

        include '../views'.$view.'.php';
    }

    /*public function response()
    {
        return '../views/responder/index.php';
    }*/

}
