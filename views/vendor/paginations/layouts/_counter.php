<ul <?php echo $innerTag; ?>>
    <li class="page-item<?php echo $page == 1 ? ' disabled' : ''; ?>">
        <a href="<?php echo $page == 1 ? '#' : '?page='.$previous; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span>
        </a>
    </li>
    <?php
        $page_link = 0;
        while ($page_link < $n_pages)
        {
            $page_link++;
            echo '<li class="page-item '.($page == $page_link ? 'active' : '').'"><a class="page-link" href="?page='.$page_link.'">'.$page_link.'</a></li>';
        }
    ?>
    <li class="page-item<?php echo $page >= $n_pages ? ' disabled' : ''; ?>">
        <a class="page-link" href="<?php echo $page >= $n_pages ? '#' : '?page='.$next; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
    </li>
</ul>