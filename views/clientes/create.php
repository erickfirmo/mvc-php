<?php 

section('title', 'MVC PHP | Clientes');
section('page-title', 'Cadastrar Cliente');
section('description', 'Cadastrar cliente');

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
                    <h3 class="box-title">Novo Cliente</h3>
                </div>
                <form role="form" method="POST" id="save-form" action="<?php route('/clientes/store'); ?>">
                    <div class="box-body">
                        <input type="hidden" name="_token" value="<?php token(); ?>">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                        </div>

                        <div class="form-group">
                            <label for="nascimento">Nascimento</label>
                            <input type="date" name="nascimento" id="nascimento" class="form-control">
                            
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" name="rg" id="rg" placeholder="RG">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="save" class="btn btn-primary">Salvar</button>
                        
                    </div>
                </form>
            </div>
            
            <!-- /.box -->
        </div>
        <div class="col-md-3"></div>
    </div>
</div>