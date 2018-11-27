<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo constant('section@title'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php url('/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php url('/assets/admin/css/style.css'); ?>">

</head>
<body>

<aside class="sidebar">
    <div>
        <img class="rounded-circle img-fluid" src="http://www.worksgmbh.de/wp-content/uploads/2017/07/platzhalter_mann.jpg" alt="profile">
    </div>
    <ul class="list-group list-group-flush">
        <li><a class="list-group-item active" href="<?php url('/'); ?>">Home</a></li>
        <li><a class="list-group-item" href="<?php url('/clientes'); ?>">Clientes</a></li>
        <li><a class="list-group-item" href="<?php url('/dividas'); ?>">Dívidas</a></li>
    </ul>
</aside>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            
        </div>
    </div>
</div>



<section class="content">
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
