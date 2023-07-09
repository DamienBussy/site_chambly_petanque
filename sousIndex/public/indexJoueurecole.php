<?php
use Controllers\Admin\JoueurEcoleController;

switch ($action) {
    case "afficher":
        require_once "Controllers/Admin/JoueurEcoleController.php";
        $controller = new JoueurEcoleController();
        $controller->AfficherLesJoueurs();
        break;
}