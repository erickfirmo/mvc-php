<?php 

section('title', 'MVC PHP | Cliente');
section('description', 'Editar cliente');

if(!defined('LAYOUT')) return 'admin';


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="box col-md-6">
            <form method="POST" action="<?php route('/clientes/update', $cliente->id); ?>">
                <input type="hidden" name="_token" value="<?php token(); ?>">
                <label for="nome">
                    Nome
                    <input type="text" name="nome" id="nome" value="<?php echo $cliente->nome; ?>" class="form-control">
                </label>
                <br>
                <label for="sobrenome">
                    Sobrenome
                    <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $cliente->sobrenome; ?>" class="form-control">    
                </label>
                <br>
                <label for="nascimento">
                    Nascimento
                    <input type="date" name="nascimento" id="nascimento" value="<?php echo $cliente->nascimento; ?>" class="form-control">    
                </label>
                <br>
                <label for="sexo">Sexo</label>
                <select name="sexo" id="sexo" class="form-control">
                    <option <?php echo ($cliente->sexo == 'M' ? 'selected="selected"' : ''); ?>value="M">Masculino</option>
                    <option <?php echo ($cliente->sexo == 'F' ? 'selected="selected"' : ''); ?>value="F">Feminino</option>
                </select>
                <br>
                <label for="rg">
                    RG
                    <input type="text" name="rg" id="rg" value="<?php echo $cliente->rg; ?>" class="form-control">
                </label>
                <br>
                <label for="cpf">
                    CPF
                    <input type="text" name="cpf" id="cpf" value="<?php echo $cliente->cpf; ?>" class="form-control">
                </label>
                <br>
                <input type="submit" value="Salvar Alterações" class="btn btn-primary">
            </form>
            <br>
            <form method="POST" action="<?php route('/clientes/destroy', $cliente->id); ?>">

                <input type="submit" value="Excluir" class="btn btn-danger">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


<h3>Dívidas do cliente</h3>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 box">
            <form method="POST" action="<?php route('/dividasdocliente/add/'); ?>">
            <input type="hidden" name="_token" value="<?php token(); ?>">

                <label for="divida_do_cliente">
                    Dívidas
                    <br>
                    <select name="divida_id" id="divida_do_cliente" class="form-control">
                    <?php 
                        foreach ($dividas as $divida)
                        {
                            echo '<option value="'.$divida->id.'">'.$divida->id.'. '.number_format($divida->valor, 2, ',', '.').'</option>';
                        }
                    ?>
                    </select>

                    <input type="hidden" name="cliente_id" value="<?php echo $cliente->id; ?>">
                
                
                </label>
                
                
                <input type="submit" class="btn btn-primary" value="Adicionar Dívida">
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Valor</th>
                            <th>Data de Vencimento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            foreach ($cliente->dividas() as $key => $divida)
                            {
                                echo '<tr>';
                                echo '<td>'.$divida->id.'</td>';
                                echo '<td>R$ '.number_format($divida->valor, 2, ',', '.').'</td>';
                                echo '<td>'.$divida->vencimento.'</td>';
                                echo '<td><a href="/dividas/'.$divida->id.'/edit/"><button class="btn btn-light">Ver/Editar</button></a>
                                <form method="POST" action="/dividasdocliente/'.$divida->pivot()->id.'/destroy/">

                                    <input type="submit" value="Remover" class="btn btn-danger">
                                </form></td>';
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