<?php 

section('title', 'MVC PHP | Clientes');
section('page-title', 'Todos os Clientes');
section('description', 'Todos os clientes');

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
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Nº de Dívidas</th>
                            <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($clientes as $cliente)
                                    {
                                        echo '<tr>';
                                        echo '<td>'.$cliente->id.'</td>';
                                        echo '<td>'.$cliente->nome.'</td>';
                                        echo '<td>'.($cliente->sexo == 'M' ? 'Masculino' : 'Feminino').'</td>';
                                        echo '<td>'.$cliente->rg.'</td>';
                                        echo '<td>'.$cliente->cpf.'</td>';
                                        echo '<td>'.count($cliente->dividas()).'</td>';
                                        echo '<td><a href="/clientes/'.$cliente->id.'/"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>&nbsp;<a href="/clientes/'.$cliente->id.'/edit/"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>&nbsp;<form style="display:inline;" method="POST" action="/clientes/'.$cliente->id.'/destroy/"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></form></td>';  
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Nº de Dívidas</th>
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