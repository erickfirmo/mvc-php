<?php 

section('title', 'Home');
section('description', 'Crud de clientes e suas dívidas.');

if(!defined('LAYOUT')) return 'admin';

?>

<h1>Clientes</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Dívidas</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            foreach($clientes as $cliente)
                            {
                                echo '<tr>';
                                echo '<td>'.$cliente->id.'</td>';
                                echo '<td>'.$cliente->nome.'</td>';
                                echo '<td>'.($cliente->sexo == 'M' ? 'Masculino' : 'Feminino').'</td>';
                                echo '<td>'.$cliente->rg.'</td>';
                                echo '<td>'.$cliente->cpf.'</td>';
                                echo '<td>'.'numero de dividas'.'</td>';
                                echo '<td><a href="/clientes/'.$cliente->id.'/edit/"><button class="btn btn-light">Ver/Editar</button></a></td>';
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