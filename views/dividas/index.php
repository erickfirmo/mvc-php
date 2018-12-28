<?php 

section('title', 'MVC PHP | Dívidas');
section('page-title', 'Todas as Dívidas');
section('description', 'Todas as dívidas');

if(!defined('LAYOUT')) return 'adminlte';

?>

<div class="container-fluid">
    <?php alert() ?>   
</div>

<div class="container-fluid">
    <div class="col-xs-12">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Todas as Dívidas</h3>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <table id="register-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            <th>Id</th>
                            <th>Devedores</th>
                            <th>Valor</th>
                            <th>Vencimento</th>
                            <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($dividas as $divida)
                                    {
                                        echo '<tr>';
                                        echo '<td>'.$divida->id.'</td>';
                                        echo '<td>'.$divida->writeParents('clientes', 'nome').'</td>';
                                        echo '<td>R$ '.number_format($divida->valor, 2, ',', '.').'</td>';
                                        echo '<td>'.$divida->vencimento.'</td>';
                                        echo '<td><a href="/dividas/'.$divida->id.'/"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>&nbsp;<a href="/dividas/'.$divida->id.'/edit/"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>&nbsp;<form style="display:inline;" method="POST" action="/dividas/'.$divida->id.'/destroy/"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></form></td>';                                        
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                            <th>Id</th>
                            <th>Devedores</th>
                            <th>Valor</th>
                            <th>Vencimento</th>
                            <th>Ações</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>