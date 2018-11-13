<?php

function alert()
{
    
    if(isset($_SESSION['alert_error']))
    {
        if($_SESSION['alert_error'] != NULL)
        {
            $msg = $_SESSION['alert_error'];
            foreach($msg as $alert)
            {
                echo '<p>'.$alert.'</p>';
            }
        }
    }

    if(isset($_SESSION['alert_success']))
    {
        if($_SESSION['alert_success'] != NULL)
        {
            echo '<p>'.$_SESSION['alert_success'].'</p>';
        }
    }



    $_SESSION['alert_error'] = NULL;
    $_SESSION['alert_success'] = NULL;

}