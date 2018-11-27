<?php 

section('title', 'MVC PHP | Dívida');
section('description', 'Editar dívida');

if(!defined('LAYOUT')) return 'admin';

?>

        <div class="col-md-3"></div>
        <div class="box col-md-6">
            <?php alert(); ?>
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
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-control">
                <?php
                foreach($clientes as $cliente)
                {
                echo '<option '.($cliente->id == $divida->cliente_id ? 'selected="selected"' : '').'value="'.$cliente->id.'">'.$cliente->nome.'</option>';
                }
                ?>
                </select>
                <br>
                <input type="submit" value="Salvar Alterações" class="btn btn-primary">
            </form>
            <br>
            <form method="POST" action="<?php route('/dividas/destroy'); ?>">
                <input type="submit" value="Excluir" class="btn btn-danger">
            </form>
        </div>
        <div class="col-md-3"></div>
        