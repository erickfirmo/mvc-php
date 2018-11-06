
<h1>Create Produto</h1>
<br>
<form method="POST" action="/produto/store">

    <label for="produto">produto</label>
    <input type="text" name="produto" id="produto">
    
    <br>
</form>


<?php 

if(isset($_SESSION['produto']))
{
    echo $_SESSION['produto'];
}

?>

