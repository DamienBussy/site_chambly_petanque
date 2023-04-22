<?php

use Controllers\ConnexionController;

switch ($action){
    case "pageCnx":
        require_once "Views/connexionView.php";
    break;
    case "saisieConnexion":
        require_once "Controllers/ConnexionController.php";
        $controller=new ConnexionController();
        $controller->SaisirLogin(null);
    break;
    case "connexion":
        require_once "Controllers/ConnexionController.php";
        $controller=new ConnexionController();
        $controller->Connecter($_POST["login"], $_POST["password"], $_POST["hauteurEcran"]);
    break;
    case "deconnexion":
        require_once "Controllers/ConnexionController.php";
        $controller=new ConnexionController();
        $controller->Deconnecter();
    break;
    case "saisieChangerPassword":
        require_once "Controllers/ConnexionController.php";
        $controller=new ConnexionController();
        $controller->StockIdUserConnect($_POST['idUserConnect']);
    break;
    case "changePassword":
        require_once "Controllers/ConnexionController.php";
        $controller=new ConnexionController();
        $controller->ChangerPassword($_POST['idUserConnect'], $_POST['passwordactuel'], $_POST['newpassword'], $_POST['newpasswordconfirme']);
    break;
    case "validationMdP":
//        require_once "Controllers/ConnexionController.php";
        require_once "Views/connexionView.php";
        $controller=new ConnexionController();
        $controller->actionValidationChangementPassword($_POST['id'], $_POST['code']);
    break;
}