<?php 

section('title', 'Home');
section('description', 'Crud de clientes e suas dívidas.');

if(!defined('LAYOUT')) return 'admin';

?>

<h1>Cliente <?php echo $cliente->nome; ?></h1>

