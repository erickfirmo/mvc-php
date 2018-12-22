
<?php 

section('title', 'MVC PHP | Register');
section('description', 'Register');

if(!defined('LAYOUT')) return 'auth';

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="box col-md-6">
            <form method="POST" action="<?php route('/auth/register'); ?>">
                <input type="hidden" name="_token" value="<?php token(); ?>">
                <label for="name">
                    Nome
                    <input type="text" name="name" id="name" class="form-control">
                </label>
                <br>
                <label for="lastname">
                    Sobrenome
                    <input type="text" name="lastname" id="lastname" class="form-control">
                </label>
                <br>

                <label for="email">
                    Email
                    <input type="text" name="email" id="email" class="form-control">
                </label>
                <br>

                <label for="password">
                    Senha
                    <input type="password" name="password" id="password" class="form-control">
                </label>
                <br>

                <label for="confirm_password">
                    Confirmar senha
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                </label>
                <br>
                <input type="submit" value="Criar Conta" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

