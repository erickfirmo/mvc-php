
<?php if(!defined('LAYOUT')) return 'app'; ?>
<h1>TODOS OS PRODUTOS</h1>

<?php alert(); ?>

<ul>
<?php
    foreach($produtos as $produto)
    {
        echo '<li><a href="/produto/'.$produto->id.'/edit">'.$produto->nome.'</a></li>';
    }
?>
</ul>


<?php

pagination_links();









