
<?php 

section('title', 'Dívidas dos Clientes | Admin Register');
section('description', 'Admin Register');

if(!defined('LAYOUT')) return 'auth';

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="box col-md-6">
            <form method="POST" action="<?php route('/auth/admin/register'); ?>">
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



<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="../../index.html" method="post">
        <input type="hidden" name="_token" value="<?php token(); ?>">

        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nome">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
            </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="login.html" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

