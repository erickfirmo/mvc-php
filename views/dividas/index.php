<?php 

section('title', 'Home');
section('description', 'Crud de clientes e suas dívidas.');

if(!defined('LAYOUT')) return 'admin';

?>

<h1>Dívidas</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Valor</th>
                            <th>Data de Vencimento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            foreach($dividas as $divida)
                            {
                                echo '<tr>';
                                echo '<td>'.$divida->id.'</td>';
                                echo '<td>'.$divida->cliente_id.'</td>';
                                echo '<td>R$ '.number_format($divida->valor, 2, ',', '.').'</td>';
                                echo '<td>'.$divida->vencimento.'</td>';
                                echo '<td><a href="/dividas/'.$divida->id.'/edit/"><button class="btn btn-light">Ver/Editar</button></a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>