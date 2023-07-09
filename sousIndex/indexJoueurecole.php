<?php

use Controllers\Admin\JoueurEcoleController;

switch ($action) {
    case "afficher":
        require_once "Controllers/Admin/JoueurEcoleController.php";
        $controller = new JoueurEcoleController();
        $controller->AfficherTousLesJoueurs();
        break;
    case "saisieAjout":
        require_once "Controllers/Admin/JoueurEcoleController.php";
        $controller = new JoueurEcoleController();
        $controller->AfficherAjoutView();
        break;
    case "ajouter":
        require_once "Controllers/Admin/JoueurEcoleController.php";
        $controller = new JoueurEcoleController();
        $controller->AjouterPartner($_POST['joueurecole_nom'], $_POST['joueurecole_prenom']);
        break;
    case "saisieModif":
        require_once "Controllers/Admin/JoueurEcoleController.php";
        $controller = new JoueurEcoleController();
        $controller->AfficherModifView($_POST['id_joueurecole']);
        break;
    case "modifier":
        require_once "Controllers/Admin/JoueurEcoleController.php";
        $controller = new JoueurEcoleController();
        $controller->ModifierPartner($_POST['id_joueurecole'], $_POST['joueurecole_nom'], $_POST['joueurecole_prenom']);
        break;
    case "delete":
        require_once "Controllers/Admin/JoueurEcoleController.php";
        $controller = new JoueurEcoleController();
        $controller->SupprimerEcole($_POST['id_joueurecole']);
        break;
}
