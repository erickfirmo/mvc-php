<?php

function pagination_links()
{
    echo '<div class="container"><div class="row"><div class="col-xs-12">';
    if($_SESSION['PAGINATE'] && $_SESSION['PAGES_NUMBER'] > 1){
        $page_link = 0;
        echo '<ul class="pagination">';
        echo '<li class="page-item'.($_SESSION['PAGE'] == 1 ? ' disabled' : '').'">';
        echo '<a class="page-link" href="#" aria-label="Previous">';
        echo '<span aria-hidden="true">&laquo;</span>';
        echo '<span class="sr-only">Previous</span>';
        echo '</a>';
        echo '</li>';
        while ($page_link < $_SESSION['PAGES_NUMBER']) {
            $page_link++;
            echo '<li class="page-item '.($_SESSION['PAGE'] == $page_link ? 'active' : '').'"><a class="page-link" href="?page='.$page_link.'">'.$page_link.'</a></li>';
        }
        echo '<li class="page-item'.($_SESSION['PAGE'] == $_SESSION['PAGES_NUMBER'] ? ' disabled' : '').'">';
        echo '<a class="page-link" href="#" aria-label="Next">';
        echo '<span aria-hidden="true">&raquo;</span>';
        echo '<span class="sr-only">Next</span>';
        echo '</a>';
        echo '</li>';
        echo '</ul>';
    }

    echo '</div></div></div>';
}
