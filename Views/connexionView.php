<?php require_once "Views/menu.php"?>
<head><link rel="stylesheet" type="text/css" href="css/styleConnexion.css"></head>
<br>
<div>
    <form id="saisieInfos" action="index.php?page=cnx_connexion" method="post">
        <?php
            echo '<p>Login : <input type="text" name="login" maxlength="15" size="15" /><br /></p>';
        ?>
        <p>Mot de passe : <input type="password" name="password" maxlength="20" size="20" /><br /></p>
        <p><input type="hidden" name="hauteurEcran" size="20" /></p>
        <p><input type="submit" value = "Se connecter" onclick="saisieInfos.hauteurEcran.value=screen.height"/></p>
    </form>
</div>