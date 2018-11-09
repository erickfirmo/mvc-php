<?php

namespace Core;


class View
{
    public function getViewResponse($view, $values=0)
    {
        if($values != NULL)
            foreach($values as $responseName => $responseValue)
                $$responseName = $responseValue;
                
        include '../views'.$view.'.php';
    }

    

}
