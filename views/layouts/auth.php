<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php section('title'); ?></title>
    <meta name="description" content="<?php section('description'); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php url('/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/regular.css" integrity="sha384-z3ccjLyn+akM2DtvRQCXJwvT5bGZsspS4uptQKNXNg778nyzvdMqiGcqHVGiAUyY" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-u5J7JghGz0qUrmEsWzBQkfvc8nK3fUT7DCaQzNQ+q4oEXhGSx+P2OqjWsfIRB8QT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php url('/assets/admin/css/style.css'); ?>">

</head>
<body>




<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <h1><?php section('description'); ?></h1>
        </div>
    </div>
</div>

<section class="login">
    <?php alert(); ?>

    <div class="container-fluid">
        <div class="row">
                <?php include '../views'.constant('CONTENT').'.php'; ?>
        </div>
    </div>
</section>
    
<script src="<?php url('/node_modules/jquery/dist/jquery.js'); ?>" ></script>
<script src="<?php url('/node_modules/popper.js/dist/umd/popper.js'); ?>" ></script>
<script src="<?php url('/node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>" ></script>
</body>
</html>
