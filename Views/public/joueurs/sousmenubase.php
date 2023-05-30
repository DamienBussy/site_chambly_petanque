<?php require_once "Views/public/menu.php" ?>
<link rel="stylesheet" type="text/css" href="css/styleMenu.css">
<style>
    .menu {
        margin-top: 100px;
        background-color: antiquewhite;
    }
</style>
<div class="menu">
    <form method="post" action="indexpublic.php">
        <ul>
<!--            <li><button type="submit" name="page" value="jou_trouverjoueur"><span>Trouver une équipe</span></button></li>-->
            <li> <button type="submit" name="page" value="jou_saisieconnexion"><span>Se Connecter</span></button></li>
            <li> <button type="submit" name="page" value="jou_saisiecreateaccount"><span>Créer un compte</span></button></li>
        </ul>
    </form>
</div>
