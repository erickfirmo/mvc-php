<?php 

section('title', 'MVC PHP | Dívidas');
section('page-title', 'Cadastrar Dívida');
section('description', 'Cadastrar dívida');

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
                    <h3 class="box-title">Nova Dívida</h3>
                </div>
                <form role="form" method="POST" id="save-form" action="<?php route('/dividas/store'); ?>">
                    <div class="box-body">
                        <input type="hidden" name="_token" value="<?php token(); ?>">
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
                        </div>
                        <div class="form-group">
                            <label for="vencimento">Vencimento</label>
                            <input type="date" class="form-control" id="vencimento" name="vencimento" placeholder="Vencimento">
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
        

        