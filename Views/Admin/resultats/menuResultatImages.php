<?php require_once "utils/protection.php";?>
<!--<link rel="stylesheet" type="text/css" href="./css/styleMenuAdmin.css">-->
<link rel="stylesheet" type="text/css" href="./css/style.css">
<form action="index.php" method="post">

    <nav class="nav-admin">
        <p><input type="hidden" name="id_resultat" value="<?= $this->data['id_resultat'] ?>" /></p>
        <img class="nav-img" src="resources/pictures/galerie.png" alt="Logo">
        <button type="submit" name="page" value="res_gestionImages" class="nav-admin-button"><span>Galerie</span></button>
        <button type="submit" name="page" value="res_saisieAjouterImage" class="nav-admin-button"><span>Ajouter</span></button>
        <button type="submit" name="page" value="res_saisieUpdateImagePrincipale" class="nav-admin-button"><span>Modifier l'image d'affiche</span></button>
        <button type="submit" name="page" value="res_saisieDeleteImage" class="nav-admin-button"><span>Supprimer</span></button>
        <button type="submit" name="page" value="res_getAllResultats" class="nav-admin-button"><span>Retour</span></button>
    </nav>
</form>