<?php if(!defined('LAYOUT')) return 'app'; ?>
<h1>Ver Produto</h1>
<br>
<?php alert(); ?>

<br>
<form method="POST" action="<?php route('/produto/destroy'); ?>">
    <input type="submit" value="Excluir">
</form>

<?php

echo $produto->nome.'<br>';
echo $produto->descricao.'<br>';
echo $produto->preco.'<br>';