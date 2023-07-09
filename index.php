<?php

use Controllers\Admin\LogController;
use Controllers\ConnexionController;

require_once "Entities/User.php";

session_start();
if (!empty($_POST['page']) || !empty($_GET['page']))
{
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
    }
    else{
        $page=$_GET['page'];
    }

}
else{
    $page="acc";
}
// On prend les 3 premiere lettre de $page pour connaitre notre direction
$direction = substr($page, 0, 3);
$action=substr($page, 4);
switch ($direction){
    case "acc":
        require_once "Views/accueilView.php";
    break;
    // ------------------------------------------------ ADMIN ----------------------------------------------
    case "cnx":
        require_once "sousIndex/indexConnexion.php";
    break;
    case "men":
        require_once "sousIndex/indexMenu.php";
    break;
    case "usr":
        require_once "sousIndex/indexUsers.php";
    break;
    case "mdp":
        require_once "Controllers/ConnexionController.php";
        $controller=new ConnexionController();
        $controller->actionValidationChangementPassword($_GET['id'], $_GET['code']);
    break;
    case "evt":
        require_once "sousIndex/indexEvents.php";
    break;
    case "res":
        require_once "sousIndex/indexResultats.php";
    break;
    case "grp":
        require_once "sousIndex/indexGrandPrix.php";
    break;
    case "lic":
        require_once "sousIndex/indexLicencies.php";
    break;
    case "adh":
        require_once "sousIndex/indexAdhesion.php";
    break;
    case "log":
        require_once "Controllers/Admin/LogController.php";
        $controller=new LogController();
        $controller->AfficherTousLesLogs();
    break;
    case "eco":
        require_once "sousIndex/indexEcole.php";
    break;
    case "par":
        require_once "sousIndex/indexPartner.php";
    break;
    case "jcl":
        require_once "sousIndex/indexJoueurecole.php";
    break;
    // ------------------------------------------------ PUBLIC ----------------------------------------------
    case "tmp":
        require_once "indexpublic.php";
    break;
}