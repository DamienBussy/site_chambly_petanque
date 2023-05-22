<?php

use Controllers\Admin\AdhesionController;

switch ($action){
    case "gestion":
        require_once "Controllers/Admin/AdhesionController.php";
        $controleur=new AdhesionController();
        $controleur->AfficheGestionInscription();
    break;
    case "afficherFichierInscription":
        require_once "Controllers/Admin/AdhesionController.php";
        $controleur=new AdhesionController();
        $controleur->AfficherFichierInscription();
    break;
    case "afficherFichierAutorisationParental":
        require_once "Controllers/Admin/AdhesionController.php";
        $controleur=new AdhesionController();
        $controleur->AfficherFichierAutorisationParentale();
    break;
    case "afficherFichierCertifMedical":
        require_once "Controllers/Admin/AdhesionController.php";
        $controleur=new AdhesionController();
        $controleur->AfficherFichierCertificatMedical();
    break;
    case "afficherFichierTarifLicencie":
        require_once "Controllers/Admin/AdhesionController.php";
        $controleur=new AdhesionController();
        $controleur->AfficherFichierTarifLicencie();
    break;
    case "upload":
        require_once "Controllers/Admin/AdhesionController.php";
        $controleur=new AdhesionController();
        $controleur->uploadFichier($_POST['id']);
    break;


}