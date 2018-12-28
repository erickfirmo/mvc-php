<?php 

section('title', 'MVC PHP | Dívida');
section('page-title', 'Informações da Dívida');
section('description', 'Informações da dívida');

if(!defined('LAYOUT')) return 'adminlte';

?>

<h1>Dívida <?php echo $divida->valor; ?></h1>

