<?php 

section('title', 'Home');
section('description', 'Crud de clientes e suas dívidas.');

if(!defined('LAYOUT')) return 'admin';

?>

<h1>Editar Cliente</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php alert(); ?>
            <form method="POST" action="<?php route('/clientes/update'); ?>">
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
            <form method="POST" action="<?php route('/clientes/destroy'); ?>">
                <input type="submit" value="Excluir" class="btn btn-danger">
            </form>
        </div>
        <div class="col-md-3"></div>
    
    </div>
</div>