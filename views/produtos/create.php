<?php if(!defined('LAYOUT')) return 'app'; ?>
<h1>Cadastrar Produto</h1>

<?php alert(); ?>

<form method="POST" action="/produto/store/">
    <label for="nome">Produto</label><br>
    <input type="text" name="nome_produto" id="nome"><br><br>
    <label for="descricao">Descrição</label><br>
    <input type="text" name="descricao_produto" id="descricao"><br><br>
    <label for="preco">Preço</label><br>
    <input type="text" name="preco_produto" id="preco"><br><br>
    <input type="submit" value="Cadastrar">
</form>
