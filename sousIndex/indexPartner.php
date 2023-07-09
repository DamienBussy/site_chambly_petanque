<?php

use Controllers\Admin\PartnerController;

switch ($action) {
    case "afficher":
        require_once "Controllers/Admin/PartnerController.php";
        $controller = new PartnerController();
        $controller->AfficherTousLesPartners();
        break;
    case "saisieAjout":
        require_once "Controllers/Admin/PartnerController.php";
        $controller = new PartnerController();
        $controller->AfficherAjoutView();
        break;
    case "ajouter":
        require_once "Controllers/Admin/PartnerController.php";
        $controller = new PartnerController();
        $controller->AjouterPartner($_POST['partner_titre'], $_POST['partner_link']);
        break;
    case "saisieModif":
        require_once "Controllers/Admin/PartnerController.php";
        $controller = new PartnerController();
        $controller->AfficherModifView($_POST['id_partner']);
        break;
    case "modifier":
        require_once "Controllers/Admin/PartnerController.php";
        $controller = new PartnerController();
        $controller->ModifierPartner($_POST['id_partner'], $_POST['partner_titre'], $_POST['partner_link']);
        break;
    case "delete":
        require_once "Controllers/Admin/PartnerController.php";
        $controller = new PartnerController();
        $controller->SupprimerEcole($_POST['id_partner']);
        break;
}
