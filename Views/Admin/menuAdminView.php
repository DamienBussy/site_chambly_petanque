<?php require_once "utils/protection.php";?>
<!DOCTYPE html>
<html>
<head>
    <title>Chambly Petanque - ADMIN</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <style>
        .nav-admin-button {
            position: relative;
            transition: transform 0.2s, background-color 0.2s, box-shadow 0.2s;
        }

        .nav-admin-button:active {
            transform: scale(0.95);
            background-color: #9a0ae3; /* Remplacez #ff0000 par la couleur souhaitée */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Ajoute une ombre légère lors du clic */
        }


    </style>
</head>

<?php $user = $_SESSION['users']; ?>

<form action="index.php" method="post">
    <nav class="nav-admin">
        <img class="nav-img" src="resources/pictures/admin.png" alt="Logo">
        <!-- <h1 class="nav-bienvenue"><?= $user->getUserFirstName() . " " . $user->getUserLastName() ?></h1> -->
        <button type="submit" name="page" value="evt_getAllEvents" class="nav-admin-button"><span>Evènements</span></button>
        <button type="submit" name="page" value="res_getAllResultats" class="nav-admin-button"><span>Résultats</span></button>

        <?php
        if ($user->getUserStatut() == "Président") {
            ?>
            <button type="submit" name="page" value="usr_getAllUsers" class="nav-admin-button"><span>Les Administrateurs</span></button>
            <?php
        }
        ?>

        <p><button type="submit" name="page" value="grp_gestion" class="nav-admin-button">Grand Prix</button></p>
        <p><button type="submit" name="page" value="adh_gestion" class="nav-admin-button">Fichiers</button></p>
        <p><button type="submit" name="page" value="lic_gestion" class="nav-admin-button">Licenciés</button></p>
        <p><button type="submit" name="page" value="eco_afficher" class="nav-admin-button">Cours EdP</button></p>
        <p><button type="submit" name="page" value="jcl_afficher" class="nav-admin-button">Joueurs EdP</button></p>

        <?php
        if ($user->getUserStatut() == "Président") {
            ?>
            <button type="submit" name="page" value="log" class="nav-admin-button"><span>Logs</span></button>
            <?php
        }
        ?>

        <button type="submit" name="page" value="par_afficher" class="nav-admin-button">Sponsors</button>
        <p><button type="submit" name="page" value="cnx_saisieChangerPassword" class="nav-admin-button">Changer mon mot de passe</button></p>
        <button type="submit" name="page" value="cnx_deconnexion" class="nav-button-active-deconnexion"><span>Se Déconnecter</span></button>
    </nav>

    <p><input type="hidden" name="idUserConnect" value="<?= $user->getUserId() ?>" /></p>
</form>
