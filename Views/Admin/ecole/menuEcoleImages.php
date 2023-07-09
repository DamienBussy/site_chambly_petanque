<?php require_once "utils/protection.php";?>
<!--<link rel="stylesheet" type="text/css" href="./css/styleMenuAdmin.css">-->
<link rel="stylesheet" type="text/css" href="./css/style.css">
<form action="index.php" method="post">

    <nav class="nav-admin">
        <p><input type="hidden" name="id_ecole" value="<?= $this->data['id_ecole'] ?>" /></p>
        <img class="nav-img" src="resources/pictures/galerie.png" alt="Logo">
        <button type="submit" name="page" value="eco_galery" class="nav-admin-button"><span>Galerie</span></button>
        <button type="submit" name="page" value="eco_saisieAjouterImage" class="nav-admin-button"><span>Ajouter</span></button>
        <button type="submit" name="page" value="eco_saisieDeleteImage" class="nav-admin-button"><span>Supprimer</span></button>
        <button type="submit" name="page" value="eco_afficher" class="nav-admin-button"><span>Retour</span></button>
    </nav>
</form>