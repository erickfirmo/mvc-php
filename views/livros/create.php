<?php if(!defined('LAYOUT')) return 'app'; ?>
<h1>Create Produto</h1>
<br>
<form method="POST" action="/produto/store/">

    <label for="produto">produto</label>
    <input type="text" name="nome" id="nome">
    <input type="text" name="descricao" id="descricao">

    <input type="submit" value="Cadastrar">

    
    <br>
</form>

<a href="http://mvc.loc/produto">index produto</a>





