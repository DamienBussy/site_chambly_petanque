<?php
use Controllers\Admin\ResultatController;
use Controllers\Admin\ImageController;

switch ($action) {
    case "getAllResultats":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherTousLesResultats();
    break;
    case "saisieAjout":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherAjoutView();
    break;
    case "ajouter":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AjouterResultat($_POST['title'], $_POST['desc'], $_POST['date'], $_POST['categ'], $_POST['annee']);
    break;
    case "saisieUpdate":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherSaisieModifierResultat($_POST['id_resultat']);
    break;
    case "modifier":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->ModifierResultat($_POST['id_resultat'],$_POST['title'], $_POST['desc'], $_POST['date'], $_POST['categ'], $_POST['annee']);
    break;
    case "delete":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->SupprimerResultat($_POST['id_resultat']);
    break;

    case "gestionImages":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherGestionImagesView($_POST['id_resultat']);
        break;
    case "saisieAjouterImage":
        require_once "Controllers/Admin/ImageController.php";
        $controller = new ImageController();
        $controller->AfficherSaisieAjoutImageForResultat($_POST['id_resultat']);
        break;
    case "ajouterImage":
        require_once "Controllers/Admin/ImageController.php";
        $controller = new ImageController();
        $controller->uploadImageResultat(); // $_POST['image_id'], $_POST['image_path'],$_POST['id_event']
        break;
    case "saisieDeleteImage":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherDeleteImagePrincipale($_POST['id_resultat']);
        break;
    case "deleteImage":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->SupprimerImage($_POST['id'], $_POST['id_resultat']);
        break;
    case "saisieUpdateImagePrincipale":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherUpdateImagePrincipale($_POST['id_resultat']);
        break;
    case "updateImagePrincipale":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->UpdateImagePrincipale($_POST['idNouveau'], $_POST['id_resultat']);
        break;
}