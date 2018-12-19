<?php 

section('title', 'MVC PHP | Dívidas');
section('description', 'Todas as dívidas');

if(!defined('LAYOUT')) return 'admin';

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Clientes</th>
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
                                echo '<td>'.$divida->writeParents('clientes', 'nome').'</td>';
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

        <?php pagination_links(['class' => 'pagination']); ?>
    </div>
</div>