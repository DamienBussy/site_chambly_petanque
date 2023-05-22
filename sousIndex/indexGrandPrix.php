<?php

use Controllers\Admin\GrandPrixController;

switch ($action){
    case "gestion":
        require_once "Controllers/Admin/GrandPrixController.php";
        $controleur=new GrandPrixController();
        $controleur->AfficheGestionGrandPrix();
    break;
    case "affiche":
        require_once "Controllers/Admin/GrandPrixController.php";
        $controleur=new GrandPrixController();
        $controleur->AfficheGrandPrix();
    break;
    case "upload":
        require_once "Controllers/Admin/GrandPrixController.php";
        $controleur=new GrandPrixController();
        $controleur->uploadAffiche();
    break;
}