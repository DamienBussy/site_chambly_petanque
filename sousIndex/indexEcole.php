<?php

use Controllers\Admin\EcoleController;
use Controllers\Admin\GaleryEcoleController;


switch ($action) {
    case "afficher":
        require_once "Controllers/Admin/EcoleController.php";
        $controller = new EcoleController();
        $controller->AfficherToutesLesEcoles();
    break;
    case "saisieAjout":
        require_once "Controllers/Admin/EcoleController.php";
        $controller = new EcoleController();
        $controller->AfficherAjoutView();
    break;
    case "ajouter":
        require_once "Controllers/Admin/EcoleController.php";
        $controller = new EcoleController();
        $controller->AjouterEcole($_POST['title'], $_POST['desc'], $_POST['date']);
    break;
    case "saisieModif":
        require_once "Controllers/Admin/EcoleController.php";
        $controller = new EcoleController();
        $controller->AfficherModifView($_POST['id_ecole']);
    break;
    case "modifier":
        require_once "Controllers/Admin/EcoleController.php";
        $controller = new EcoleController();
        $controller->ModifierEcole($_POST['id_ecole'], $_POST['title'], $_POST['desc'], $_POST['date']);
    break;
    case "delete":
        require_once "Controllers/Admin/EcoleController.php";
        $controller = new EcoleController();
        $controller->SupprimerEcole($_POST['id_ecole']);
    break;

    case "galery":
        require_once "Controllers/Admin/GaleryEcoleController.php";
        $controller = new GaleryEcoleController();
        $controller->AfficherPhotos($_POST['id_ecole']);
    break;
    case "saisieAjouterImage":
        require_once "Controllers/Admin/GaleryEcoleController.php";
        $controller = new GaleryEcoleController();
        $controller->AfficherAjouterPhoto($_POST['id_ecole']);
    break;
    case "ajouterImage":
        require_once "Controllers/Admin/GaleryEcoleController.php";
        $controller = new GaleryEcoleController();
        $controller->uploadImage();
    break;
    case "deleteImage":
        require_once "Controllers/Admin/GaleryEcoleController.php";
        $controller = new GaleryEcoleController();
        $controller->SupprimerImage($_POST['id'], $_POST['id_ecole']);
    break;
    case "saisieDeleteImage":
        require_once "Controllers/Admin/GaleryEcoleController.php";
        $controller = new GaleryEcoleController();
        $controller->AfficherSupprimerPhotos($_POST['id_ecole']);
    break;
}
