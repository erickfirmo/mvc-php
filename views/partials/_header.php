<nav class="nav navbar">
    <ul>
        <li class="active-links">
            <form method="POST" action="<?php route('/auth/logout'); ?>">
                <input type="hidden" value='<?php echo $_SESSION['login@user']; ?>'>

                <input type="submit" value="Sair">

            
            
            </form>
        </li>
    
    </ul>
</nav>