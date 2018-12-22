
<?php 

section('title', 'MVC PHP | Entrar');
section('description', 'Entrar');

if(!defined('LAYOUT')) return 'auth';

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-1 col-sm-2 col-md-2"></div>
        <div class=" col-10 col-sm-8 col-md-8">
            <div class="row">
                <div class="box login_form">

                <form method="POST" action="<?php route('/auth/login'); ?>">
                    <input type="hidden" name="_token" value="<?php token(); ?>">
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

                    <label for="remember-me">
                        Mantenha-me conectado
                        <br>
                        <input type="checkbox" name="remember-me" id="remember-me">
                    </label>
                    <br>
                    <br>


                    
                    <input type="submit" value="Entrar" class="btn btn-primary">
                </form>
                
                
                
                
                
                </div>
        
                
            
            </div>
        </div>
        <div class="col-1 col-sm-2 col-md-2"></div>
    </div>
</div>


