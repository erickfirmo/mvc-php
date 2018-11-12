<?php if(!defined('LAYOUT')) return 'app'; ?>
<h1>Editar Produto</h1>
<br>
<form method="POST" action="<?php route('/produto/update'); ?>">
    <label for="nome">Produto</label><br>
    <input type="text" name="nome_produto" id="nome_produto"><br><br>
    
    <label for="descricao">Descrição</label><br>
    <input type="text" name="descricao_produto" id="descricao_produto"><br><br>

    <label for="preco">Preço</label><br>
    <input type="text" name="preco_produto" id="preco_produto"><br><br>

    <input type="submit" value="Salvar Alterações">
    <br>
</form>
<br>
<form method="POST" action="<?php route('/produto/destroy'); ?>">
    <input type="submit" value="Excluir">
</form>

<?php

echo $produto->nome;
