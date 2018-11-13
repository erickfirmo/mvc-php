<?php


function pagination_links()
{
    if($_SESSION['PAGINATE']){
        $page_link = 0;
        while ($page_link <= $_SESSION['PAGINATION_PAGES_NUMBER']) {
            $page_link++;
            echo '<a '.($_SESSION['PAGE'] == $page_link ? 'style="color:red;"' : '').'" href="?page='.$page_link.'">'.$page_link.'</a>';
        }
    }
}