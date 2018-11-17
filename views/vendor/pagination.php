<?php

function pagination_links()
{
    if($_SESSION['PAGINATE'] && $_SESSION['PAGES_NUMBER'] > 1){
        $page_link = 0;
        echo '<ul style="list-style-type:none;">';
        while ($page_link < $_SESSION['PAGES_NUMBER']) {
            $page_link++;
            echo '<li style="float:left;"><a '.($_SESSION['PAGE'] == $page_link ? 'style="color:red;"' : '').'" href="?page='.$page_link.'">'.$page_link.'</a></li>';
        }
        echo '</ul>';
    }
}