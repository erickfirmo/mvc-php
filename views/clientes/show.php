<?php 

section('title', 'MVC PHP | Cliente');
section('page-title', 'Informações do Cliente');
section('description', 'Informações do cliente');

if(!defined('LAYOUT')) return 'adminlte';

?>

<h1>Cliente <?php echo $cliente->nome.' '.$cliente->sobrenome; ?></h1>

