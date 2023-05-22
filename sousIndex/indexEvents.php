<?php

use Controllers\Admin\EventController;
use Controllers\Admin\ImageController;

switch ($action) {
    case "getAllEvents":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->AfficherTousLesEvents();
    break;
    case "saisieAjout":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->AfficherAjoutView();
    break;
    case "ajouter":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->AjouterEvent($_POST['title'], $_POST['desc'], $_POST['date'], $_POST['lieu'], $_POST['heureDebut'], $_POST['heureFin'], $_POST['categ']);
    break;
    case "saisieModifier":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->SaisieModifierEvent($_POST['id_event']);
    break;
    case "modifier":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->ModifierEvent($_POST['id_event'], $_POST['title'], $_POST['desc'], $_POST['date'], $_POST['lieu'], $_POST['heureDebut'], $_POST['heureFin'], $_POST['categ']);
        break;
    case "delete":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->SupprimerEvent($_POST['id_event']);
        break;
    case "gestionImages":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->AfficherGestionImagesView($_POST['id_event']);
    break;
    case "saisieAjouterImage":
        require_once "Controllers/Admin/ImageController.php";
        $controller = new ImageController();
        $controller->AfficherSaisieAjoutImageForEvent($_POST['id_event']);
    break;
    case "ajouterImage":
        require_once "Controllers/Admin/ImageController.php";
        $controller = new ImageController();
        $controller->uploadImage(); // $_POST['image_id'], $_POST['image_path'],$_POST['id_event']
    break;
    case "saisieDeleteImage":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->AfficherDeleteImagePrincipale($_POST['id_event']);
    break;
    case "deleteImage":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->SupprimerImage($_POST['id'], $_POST['id_event']);
    break;
    case "saisieUpdateImagePrincipale":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->AfficherUpdateImagePrincipale($_POST['id_event']);
    break;
    case "updateImagePrincipale":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->UpdateImagePrincipale($_POST['idNouveau'], $_POST['id_event']);
    break;


}
