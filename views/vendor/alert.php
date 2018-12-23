<?php

function alert()
{
    
    if(isset($_SESSION['alert-validation']))
    {
        if($_SESSION['alert-validation'] != NULL)
        {
            foreach($_SESSION['alert-validation'] as $error)
            {
                echo '<div class="alert alert-danger" role="alert">'.$error.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>';
            }
        }
    }

    if(isset($_SESSION['alert-success']))
    {
        if($_SESSION['alert-success'] != NULL)
        {
            echo '<div class="alert alert-success" role="alert">'.$_SESSION['alert-success'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>';
        }
    }

    if(isset($_SESSION['alert-danger']))
    {
        if($_SESSION['alert-danger'] != NULL)
        {
            echo '<div class="alert alert-danger" role="alert">'.$_SESSION['alert-danger'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>';
        }
    }

    $_SESSION['alert-validation'] = NULL;
    $_SESSION['alert-danger'] = NULL;
    $_SESSION['alert-success'] = NULL;

}