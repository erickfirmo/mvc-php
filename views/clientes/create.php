<?php 

section('title', 'Home');
section('description', 'Crud de clientes e suas dívidas.');

if(!defined('LAYOUT')) return 'admin';

?>

<h1>Cadastrar Cliente</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php alert(); ?>
            <form method="POST" action="<?php route('/clientes/store'); ?>">
                <input type="hidden" name="_token" value="<?php token(); ?>">
                <label for="nome">
                    Nome
                    <input type="text" name="nome" id="nome" class="form-control">
                </label>
                <br>
                <label for="sobrenome">
                    Sobrenome
                    <input type="text" name="sobrenome" id="sobrenome" class="form-control">    
                </label>
                <br>
                <label for="nascimento">
                    Nascimento
                    <input type="date" name="nascimento" id="nascimento" class="form-control">    
                </label>
                <br>
                <label for="sexo">Sexo</label>
                <select name="sexo" id="sexo" class="form-control">
                    <option selected value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
                <br>
                <label for="rg">
                    RG
                    <input type="text" name="rg" id="rg" class="form-control">
                </label>
                <br>
                <label for="cpf">
                    CPF
                    <input type="text" name="cpf" id="cpf" class="form-control">
                </label>
                <br>
                <input type="submit" value="Cadastrar Cliente" class="btn btn-primary">
            </form>
        </div>
</div>