<?php 

section('title', 'MVC PHP | Dívida');
section('description', 'Informações da dívida');

if(!defined('LAYOUT')) return 'admin';

?>

<h1>Dívida <?php echo $divida->valor; ?></h1>

