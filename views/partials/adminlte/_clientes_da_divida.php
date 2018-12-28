<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Adicionar Cliente à Dívida</h3>
                </div>
                <form  method="POST" action="<?php route('/dividasdocliente/add/'); ?>">
                    <div class="box-body">
                        <input type="hidden" name="_token" value="<?php token(); ?>">
                        <input type="hidden" name="divida_id" value="<?php echo $divida->id; ?>">
                        <div class="form-group">
                            <label for="clientes">Clientes</label>
                            <select name="cliente_id" id="clientes" class="form-control">
                            <?php 
                                foreach ($clientes as $cliente)
                                {
                                    echo '<option value="'.$cliente->id.'">'.$cliente->id.'. '.$cliente->nome.' '.$cliente->sobrenome.'</option>';
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
                <h3 class="box-title">Clientes da Dívida</h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <table id="register-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Nº de Dívidas</th>
                        <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($divida->clientes() as $cliente)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$cliente->id.'</td>';
                                    echo '<td>'.$cliente->nome.'</td>';
                                    echo '<td>'.($cliente->sexo == 'M' ? 'Masculino' : 'Feminino').'</td>';
                                    echo '<td>'.$cliente->rg.'</td>';
                                    echo '<td>'.$cliente->cpf.'</td>';
                                    echo '<td>'.count($cliente->dividas()).'</td>';
                                    echo '<td><a href="/dividas/'.$cliente->id.'/"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>&nbsp;<a href="/dividas/'.$cliente->id.'/edit/"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>&nbsp;<form style="display:inline;" method="POST" action="/dividasdocliente/'.$cliente->pivot()->id.'/destroy/"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></form></td>';                                    
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                        <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Nº de Dívidas</th>
                        <th>Ações</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>