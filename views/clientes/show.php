<?php 

section('title', 'MVC PHP | Cliente');
section('description', 'Informações do cliente');

if(!defined('LAYOUT')) return 'admin';

?>

<h1>Cliente <?php echo $cliente->nome; ?></h1>

