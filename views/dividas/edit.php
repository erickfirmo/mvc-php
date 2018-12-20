<?php 

section('title', 'MVC PHP | Dívida');
section('description', 'Editar dívida');

if(!defined('LAYOUT')) return 'admin';

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
            <div class="box col-md-6">
                <form method="POST" action="<?php route('/dividas/update'); ?>">
                    <input type="hidden" name="_token" value="<?php token(); ?>">
                    <label for="valor">
                        Valor
                        <input type="text" name="valor" id="valor" value="<?php echo $divida->valor; ?>" class="form-control">
                    </label>
                    <br>
                    <label for="vencimento">
                        Vencimento
                        <input type="date" name="vencimento" id="vencimento" value="<?php echo $divida->vencimento; ?>" class="form-control">    
                    </label>
                    <br>
                    <input type="submit" value="Salvar Alterações" class="btn btn-primary">
                </form>
                <br>
                <form method="POST" action="<?php route('/dividas/destroy'); ?>">
                    <input type="submit" value="Excluir" class="btn btn-danger">
                </form>
            </div>
        <div class="col-md-3"></div>
    </div>
</div>


<h3>Devedores</h3>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 box">
            <form method="POST" action="<?php route('/dividasdocliente/add/'); ?>">
            <input type="hidden" name="_token" value="<?php token(); ?>">

                <label for="divida_do_cliente">
                    Clientes
                    <br>
                    <select name="cliente_id" id="divida_do_cliente" class="form-control">
                    <?php 
                        foreach ($clientes as $cliente)
                        {
                            echo '<option value="'.$cliente->id.'">'.$cliente->id.'. '.$cliente->nome.'</option>';
                        }
                    ?>
                    </select>

                    <input type="hidden" name="divida_id" value="<?php echo $divida->id; ?>">
                
                
                </label>
                
                
                <input type="submit" class="btn btn-primary" value="Adicionar Cliente">
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
                            <th>Nome</th>
                            <th>Nascimento</th>
                            <th>Sexo</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Nº de Dívidas</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            
                            foreach ($divida->clientes() as $key => $cliente)
                            {
                                echo '<tr>';
                                echo '<td>'.$cliente->id.'</td>';
                                echo '<td>'.$cliente->nome.' '.$cliente->sobrenome.'</td>';
                                echo '<td>'.$cliente->nascimento.'</td>';
                                echo '<td>'.$cliente->sexo.'</td>';
                                echo '<td>'.$cliente->rg.'</td>';

                                echo '<td>'.$cliente->cpf.'</td>';

                                echo '<td>'.count($cliente->dividas()).'</td>';


                                echo '<td><a href="/clientes/'.$cliente->id.'/edit/"><button class="btn btn-light">Ver/Editar</button></a>
                                <form method="POST" action="/dividasdocliente/'.$cliente->pivot()->id.'/destroy/">
                                    <input type="submit" value="Remover" class="btn btn-danger">
                                </form>
                                </td>';
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
        
        