<?php

if(isset($_SESSION['content@response']))
{
    foreach($_SESSION['content@response'] as $responseName => $responseValue)
    {
        $$responseName = $responseValue;
    }
}
