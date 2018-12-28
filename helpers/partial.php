<?php
function partial($path, $values=NULL)
{
    if($values != NULL)
            foreach($values as $responseName => $responseValue)
                $$responseName = $responseValue;
                
    require '../views/partials/'.$path.'.php';
}