<?php

use Controllers\Admin\UserController;

switch ($action){
    case "getAllUsers":
        require_once "Controllers/Admin/UserController.php";
        $controller=new UserController();
        $controller->AfficherTousLesAdmin();
    break;
    case "delete":
        require_once "Controllers/Admin/UserController.php";
        $controller=new UserController();
        $controller->SupprimerAdmin($_POST['id']);
    break;
    case "saisieAjout":
        require_once "Controllers/Admin/UserController.php";
        $controller=new UserController();
        $controller->AfficherAjoutView();
//        require_once "Views/Admin/users/saisieAjoutEvent.php";
    break;
    case "add":
        require_once "Controllers/Admin/UserController.php";
        $controller=new UserController();
        $controller->VerifAjout($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['login'], $_POST['password'], $_POST['statut']);
//        $controller->AjouterAdmin($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['login'], $_POST['password'], $_POST['statut']);
    break;
    case "saisieUpdate":
        require_once "Controllers/Admin/UserController.php";
        $controller=new UserController();
        $controller->GetUserById($_POST['id']);
    break;
    case "update":
        require_once "Controllers/Admin/UserController.php";
        $controller=new UserController();
        $controller->VerifModif($_POST['id'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['login'], $_POST['statut']);
    break;
    case "saisieNouveauPresident":
        require_once "Controllers/Admin/UserController.php";
        $controller=new UserController();
        $controller->AfficherDegraderView(null);
    break;
    case "degrader":
        require_once "Controllers/Admin/UserController.php";
        $controller=new UserController();
        $controller->VerifIdPresidents($_POST['idNouveau']);
    break;
}