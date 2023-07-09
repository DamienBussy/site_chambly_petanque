<?php
use Controllers\Admin\EcoleController;

switch ($action) {
    case "afficher":
        require_once "Controllers/Admin/EcoleController.php";
        $controller = new EcoleController();
        $controller->AfficherLesEcoles();
    break;
    case "ecoledetail":
        require_once "Controllers/Admin/EcoleController.php";
        $controller = new EcoleController();
        $controller->AfficherDetails($_GET['id']);
    break;

}