<?php 

section('title', 'MVC PHP | Dívidas');
section('description', 'Cadastrar dívida');

if(!defined('LAYOUT')) return 'admin';

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
            <div class="box col-md-6">
                <?php alert(); ?>
                <form method="POST" action="<?php route('/dividas/store'); ?>">
                    <input type="hidden" name="_token" value="<?php token(); ?>">
                    <label for="valor">
                        Valor
                        <input type="text" name="valor" id="valor" class="form-control">
                    </label>
                    <br>
                    <label for="vencimento">
                        Vencimento
                        <input type="date" name="vencimento" id="vencimento" class="form-control">    
                    </label>
                    <br>
                        <input type="submit" value="Cadastrar Dívida" class="btn btn-primary">
                </form>
            </div>
        <div class="col-md-3"></div>
    </div>
</div>

        

        