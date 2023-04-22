<?php require_once "utils/protection.php";?>
<!--<link rel="stylesheet" type="text/css" href="./css/styleMenuAdmin.css">-->
<link rel="stylesheet" type="text/css" href="./css/style.css">
<?php $user = $_SESSION['users']; ?>
    <form action="index.php" method="post">
        <nav class="nav-admin">
            <img class="nav-img" src="resources/pictures/admin.png" alt="Logo">
            <h1 class="nav-bienvenue"><?php echo "Bienvenue " . $user->getUserFirstName() . " " . $user->getUserLastName(). "   /    Rôle : ". $user->getUserStatut(); ?></h1>
            <button type="submit" name="page" value="evt_getAllEvents" class="nav-admin-button"><span>Evènement</span></button>
            <?php
            if($user->getUserStatut() == "Président"){
                ?><button type="submit" name="page" value="usr_getAllUsers" class="nav-admin-button"><span>Les Administrateurs</span></button><?php
            }
            ?>
            <p><button type="submit" name="page" value="cnx_saisieChangerPassword" class="nav-admin-button">Changer mon mot de passe</button></p>
            <button type="submit" name="page" value="cnx_deconnexion" class="nav-button-active-deconnexion"><span>Se Déconnecter</span></button>
        </nav>

        <p><input type="hidden" name="idUserConnect" value="<?= $user->getUserId() ?>" /></p>
    </form>