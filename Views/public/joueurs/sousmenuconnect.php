<?php require_once "Views/public/menu.php" ?>

<?php $joueur = $_SESSION['joueurs']; ?>
<!--<link rel="stylesheet" type="text/css" href="css/styleMenu.css">-->
<style>
    .menu {
        margin-top: 100px;
        background-color: #86a2ad;
        display: flex;
        justify-content: space-between;
        margin-left: 50px;
        margin-right: 50px;
        padding: 10px;
    }

    .menu ul {
        display: flex;
        align-items: center;
        list-style-type: none;
        margin: 0;
        padding: 0;
        flex-grow: 1;
        justify-content: flex-end;
        margin-left: 550px;
    }

    .menu li {
        margin-right: 10px;
    }

    .menu img {
        width: 100px;
        height: 100px;
        margin-right: 5px;
        border-radius: 50%;
    }

    .menu .nav-bienvenue {
        font-weight: bold;
        display: flex;
        align-items: center;
        margin-right: 10px;
        margin-left: 500px;
    }
</style>
<div class="menu">
    <form method="post" action="indexpublic.php">
        <ul>
            <li><button type="submit" name="page" value="jou_trouverjoueur-connecte" class="nav-admin-button"><span>Trouver une équipe</span></button></li>
            <li><button type="submit" name="page" value="jou_moncompte" class="nav-admin-button"><span>Mon compte</span></button></li>
            <div class="nav-bienvenue">
                <?= $joueur->getJoueurPrenom() . " " . $joueur->getJoueurNom() ?>
                <img src="<?= $joueur->getJoueurPhoto() ?>" alt="">
            </div>
        </ul>

        <input type="hidden" name="id" value="<?= $joueur->getJoueurId() ?>" />
    </form>
</div>

