<?php 

section('title', 'MVC PHP | Clientes');
section('page-title', 'Editar Cliente');
section('description', 'Editar cliente');

if(!defined('LAYOUT')) return 'adminlte';

?>

<div class="container-fluid">
    <?php alert() ?>   
</div>


<div class="container-fluid">
    <div class="row">
    <div class="col-md-3"></div>

        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Cliente</h3>
                </div>
                <form role="form" method="POST" id="save-form" action="<?php route('/clientes/update', $cliente->id); ?>">
                    <div class="box-body">
                        <input type="hidden" name="_token" value="<?php token(); ?>">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $cliente->nome; ?>" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome"  value="<?php echo $cliente->sobrenome; ?>" placeholder="Sobrenome">
                        </div>

                        <div class="form-group">
                            <label for="nascimento">Nascimento</label>
                            <input type="date" name="nascimento" id="nascimento" class="form-control" value="<?php echo $cliente->nascimento; ?>">
                            
                            <!-- /.input group -->
                        </div>


                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control">
                                <option <?php echo ($cliente->sexo == 'M' ? 'selected="selected"' : ''); ?>value="M">Masculino</option>
                                <option <?php echo ($cliente->sexo == 'F' ? 'selected="selected"' : ''); ?>value="F">Feminino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" name="rg" id="rg" placeholder="RG" value="<?php echo $cliente->rg; ?>">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" value="<?php echo $cliente->cpf; ?>">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="save" class="btn btn-primary">Salvar</button>
                            <button type="submit" id="destroy" class="btn btn-danger remove">Excluir</button>
                        
                    </div>
                </form>

                <form method="POST" id="destroy-form" action="<?php route('/clientes/destroy', $cliente->id); ?>">
                </form>
                
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


<?php partial('/adminlte/_dividas_do_cliente', ['cliente' => $cliente, 'dividas' => $dividas]); 







?>