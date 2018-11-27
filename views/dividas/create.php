<?php 

section('title', 'MVC PHP | Dívidas');
section('description', 'Cadastrar dívida');

if(!defined('LAYOUT')) return 'admin';

?>

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
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-control">
                <?php
                    foreach($clientes as $cliente)
                    {
                    echo '<option value="'.$cliente->id.'">'.$cliente->nome.'</option>';
                    }
                ?>
                </select>
                <br>
                <input type="submit" value="Cadastrar Dívida" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-3"></div>

        