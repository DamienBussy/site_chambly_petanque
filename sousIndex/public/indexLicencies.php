<?php

use Controllers\Admin\LicencieController;

switch ($action){

    case "licencies":
        require_once "Controllers/Admin/LicencieController.php";
        $controleur=new LicencieController();
        $controleur->AfficherTousLesLicenciesPublic();
    break;
    case "compositionbureau":
        require_once "Controllers/Admin/LicencieController.php";
        $controleur=new LicencieController();
        $controleur->AfficherCompositionBureauPublic();
    break;
    case "recherche":
        require_once "Controllers/Admin/LicencieController.php";
        $controleur=new LicencieController();
        $controleur->RechercherLicencie($_POST['categ'], $_POST['q'], $_POST['classe']);
    break;

}