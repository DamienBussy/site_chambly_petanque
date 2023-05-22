<?php
use Controllers\Admin\ResultatController;
use Controllers\Admin\ImageController;

switch ($action) {
    case "getAllResultats":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherResultatsPublic();
    break;
    case "getAllResultatsCPFJP":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherResultatsCPFJPPublic();
    break;
    case "getAllResultatsCPFP":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherResultatsCPFPetanquePublic();
    break;
    case "getAllResultatsChampClubP":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherResultatsChampClubPetanquePublic();
    break;
    case "getAllResultatsChampClubJP":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherResultatsChampClubJPPublic();
    break;
    case "resultatDetails":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherResultatDetailsPublic($_GET['id']);
    break;
    case "recherche":
        require_once "Controllers/Admin/ResultatController.php";
        $controller = new ResultatController();
        $controller->AfficherResultatRecherchePublic($_POST['categ'], $_POST['annee'], $_POST['souscateg']);
    break;


}
