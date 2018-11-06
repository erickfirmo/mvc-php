<?php

namespace Core;


class View
{


   
    
    public function getView($view)
    {
        return '../views'.$view.'.php';
    }


    

}
