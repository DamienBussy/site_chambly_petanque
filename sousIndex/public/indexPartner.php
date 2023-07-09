<?php
use Controllers\Admin\PartnerController;

switch ($action) {
    case "afficher":
        require_once "Controllers/Admin/PartnerController.php";
        $controller = new PartnerController();
        $controller->AfficherLesPartners();
        break;
}
