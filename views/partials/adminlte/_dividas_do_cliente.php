<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Adicionar Dívida ao Cliente</h3>
                </div>
                <form  method="POST" action="<?php route('/dividasdocliente/add/'); ?>">
                    <div class="box-body">
                        <input type="hidden" name="_token" value="<?php token(); ?>">
                        <input type="hidden" name="cliente_id" value="<?php echo $cliente->id; ?>">
                        <div class="form-group">
                            <label for="dividas">Dívidas</label>
                            <select name="divida_id" id="dividas" class="form-control">
                            <?php 
                                foreach ($dividas as $divida)
                                {
                                    echo '<option value="'.$divida->id.'">'.$divida->id.'. '.number_format($divida->valor, 2, ',', '.').'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="save" class="btn btn-primary">Adicionar</button>                        
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Dívidas do Cliente</h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <table id="register-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>Id</th>
                        <th>Devedores</th>
                        <th>Valor</th>
                        <th>Vencimento</th>
                        <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($cliente->dividas() as $divida)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$divida->id.'</td>';
                                    echo '<td>'.$divida->writeParents('clientes', 'nome').'</td>';
                                    echo '<td>R$ '.number_format($divida->valor, 2, ',', '.').'</td>';
                                    echo '<td>'.$divida->vencimento.'</td>';
                                    echo '<td><a href="/dividas/'.$divida->id.'/"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>&nbsp;<a href="/dividas/'.$divida->id.'/edit/"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>&nbsp;<form style="display:inline;" method="POST" action="/dividasdocliente/'.$cliente->pivot()->id.'/destroy/"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></form></td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                        <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Devedores</th>
                        <th>Valor</th>
                        <th>Vencimento</th>
                        <th>Ações</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>