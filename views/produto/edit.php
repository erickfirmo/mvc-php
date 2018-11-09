<?php if(!defined('LAYOUT')) return 'site'; ?>


<h1>Edit Produto</h1>
<br>
<form method="POST" action="/produto/1/update">

    <label for="produto">produto</label>
    <input type="text" name="nome" id="nome">
    <input type="text" name="descricao" id="descricao">

    <input type="submit" value="Salvar Alterações">

    
    <br>
</form>

<a href="http://mvc.loc/produto">index produto</a>



