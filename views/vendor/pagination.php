<?php

function pagination_links($property)
{
    $page = $_SESSION['PAGE'];
    $n_pages = $_SESSION['PAGES_NUMBER'];
    $previous = $page-1;
    $next = $page+1;
    echo '<div class="container"><div class="row"><div class="col-xs-12">';
    if($_SESSION['PAGINATE'] && $n_pages > 1){

        $innerTag = '';
        foreach ($property as $prop => $value) {
            $innerTag = $innerTag.' '.$prop.'="'.$value.'"';
        }
        echo '<ul '.$innerTag.'>';
        echo '<li class="page-item'.($page == 1 ? ' disabled' : '').'">
        <a class="page-link" href="'.($page == 1 ? '#' : '?page='.$previous).'" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
        $page_link = 0;
        while ($page_link < $n_pages)
        {
            $page_link++;
            echo '<li class="page-item '.($page == $page_link ? 'active' : '').'"><a class="page-link" href="?page='.$page_link.'">'.$page_link.'</a></li>';
        }
        echo '<li class="page-item'.($page >= $n_pages ? ' disabled' : '').'">
        <a class="page-link" href="'.($page >= $n_pages ? '#' : '?page='.$next).'" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
        </a></li></ul>';
    }
    echo '</div></div></div>';
}


