<?php

use Controllers\Admin\GrandPrixController;

switch ($action){
    case "affiche":
        require_once "Controllers/Admin/GrandPrixController.php";
        $controleur=new GrandPrixController();
        $controleur->AfficheGrandPrix();
        break;
}