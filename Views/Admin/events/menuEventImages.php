<?php require_once "utils/protection.php";?>
<!--<link rel="stylesheet" type="text/css" href="./css/styleMenuAdmin.css">-->
<link rel="stylesheet" type="text/css" href="./css/style.css">
<form action="index.php" method="post">

    <nav class="nav-admin">
        <p><input type="hidden" name="id_event" value="<?= $this->data['id_event'] ?>" /></p>
        <img class="nav-img" src="resources/pictures/galerie.png" alt="Logo">
        <button type="submit" name="page" value="evt_gestionImages" class="nav-admin-button"><span>Galerie</span></button>
        <button type="submit" name="page" value="evt_saisieAjouterImage" class="nav-admin-button"><span>Ajouter</span></button>
        <button type="submit" name="page" value="evt_saisieUpdateImagePrincipale" class="nav-admin-button"><span>Modifier l'image d'affiche</span></button>
        <button type="submit" name="page" value="evt_saisieDeleteImage" class="nav-admin-button"><span>Supprimer</span></button>
        <button type="submit" name="page" value="evt_getAllEvents" class="nav-admin-button"><span>Retour</span></button>
    </nav>
</form>