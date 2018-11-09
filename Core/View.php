<?php

namespace Core;


class View
{
    public function getViewResponse($view, $values=0)
    {
        if($values != NULL)
            foreach($values as $responseName => $responseValue)
                $$responseName = $responseValue;
        
        $layout = include '../views'.$view.'.php';

        define('CONTENT', $view);

        define('LAYOUT', $layout);

        include '../views/layouts/'.$layout.'.php';
    }

}
