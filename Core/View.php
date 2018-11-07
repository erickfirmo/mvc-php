<?php

namespace Core;


class View
{


   
    
    public function getView($view)
    {
        /*$_SESSION['request@view'] = '../views'.$view.'.php';
        $_SESSION['request@action'] = false;

        $a = $_SESSION['request@url'];
        $_SESSION['request@url'] = 'NULL';*/

        //return $this->redirect($a);

        include '../views/layouts/layout.php';
        include '../views'.$view.'.php';



        
        
    }

    public function redirect($route)
    {
        
        return header('location: http://mvc.loc'.$route);
		exit();
    }


    

}
