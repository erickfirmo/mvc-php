
<h1>Create Produto</h1>
<br>
<form method="POST" action="/produto/store">

    <label for="produto">produto</label>
    <input type="text" name="nome" id="produto">
    
    <br>
</form>

<a href="http://mvc.loc/produto">index produto</a>

<?php

echo $_SERVER['REQUEST_METHOD'];


