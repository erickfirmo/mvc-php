<?php 

section('title', 'MVC PHP | Dívida');
section('page-title', 'Editar Dívida');
section('description', 'Editar dívida');

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
                    <h3 class="box-title">Editar Dívida</h3>
                </div>
                <form role="form" method="POST" id="save-form" action="<?php route('/dividas/update', $divida->id); ?>">
                    <div class="box-body">
                        <input type="hidden" name="_token" value="<?php token(); ?>">
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor" value="<?php echo $divida->valor; ?>">
                        </div>
                        <div class="form-group">
                            <label for="vencimento">Vencimento</label>
                            <input type="date" class="form-control" id="vencimento" name="vencimento" placeholder="Vencimento" value="<?php echo $divida->vencimento; ?>">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="save" class="btn btn-primary">Salvar</button>
                        <button type="submit" id="destroy" class="btn btn-danger remove">Excluir</button>
                    </div>
                </form>

                <form method="POST" id="destroy-form" action="<?php route('/dividas/destroy', $divida->id); ?>">
                </form>
            </div>
            
            <!-- /.box -->
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php partial('adminlte/_clientes_da_divida', ['divida' => $divida, 'clientes' => $clientes]); ?>
        