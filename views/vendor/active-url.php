<?php
    function classActiveUrl($url)
    {
        if($_SERVER['REQUEST_URI'] == $url)
        {
            echo ' active';
        }
    }
?>