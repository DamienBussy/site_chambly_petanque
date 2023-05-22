<?php

use Controllers\Admin\LicencieController;
use Controllers\Admin\ImageController;

switch ($action) {
    case "gestion":
        require_once "Controllers/Admin/LicencieController.php";
        $controller = new LicencieController();
        $controller->AfficherTousLesLicencies();
    break;
    case "saisieAjouter":
        require_once "Views/Admin/licencies/ajouterLicencie.php";
    break;
    case "ajouter":
        require_once "Controllers/Admin/LicencieController.php";
        $controller = new LicencieController();
        $controller->AjouterLicencie($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['statut'], $_POST['categ'], $_POST['classe']);
    break;
    case "saisieModifier":
        require_once "Controllers/Admin/LicencieController.php";
        $controller = new LicencieController();
        $controller->AfficherSaisieModifierLicencie($_POST['id_licencie']);
    break;
    case "modifier":
        require_once "Controllers/Admin/LicencieController.php";
        $controller = new LicencieController();
        if(isset($_POST['image_path_identique'])){
            $controller->ModifierLicencieSansModifPhoto($_POST['idCourant'] ,$_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['statut'], $_POST['categ'], $_POST['classe']);
        } else{
            $controller->ModifierLicencie($_POST['idCourant'] ,$_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['statut'], $_POST['categ'], $_POST['classe']);
        }

    break;
    case "delete":
        require_once "Controllers/Admin/LicencieController.php";
        $controller = new LicencieController();
        $controller->SupprimerLicencie($_POST['id_licencie']);
    break;
    case "deletePhoto":
        require_once "Controllers/Admin/LicencieController.php";
        $controller = new LicencieController();
        $controller->SupprimerPhoto($_GET['idCourant']);
    break;
    case "saisieUpload":
        require_once "Controllers/Admin/LicencieController.php";
        $controller = new LicencieController();
        $controller->SaisieUpload();
        break;
    case "renouveler":
        require_once "Controllers/Admin/LicencieController.php";
        $controller = new LicencieController();
        $controller->RenouvelerLicencies();
    break;
}