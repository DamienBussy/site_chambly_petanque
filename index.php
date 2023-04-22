<?php

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
    if(empty($_SESSION['users'])){
        $page="acc";
    }
    else{
//        die(var_dump($_SESSION['users']->GetUserStatut() ));
        if($_SESSION['users']->getUserStatut() == "Président"){
            $page="men_menuAdmin";
        }
        else{
            if($_SESSION['users']->getUserStatut() == "Admin"){
                $page="men_menuAdmin";
            }
            else{
                $page="acc";
            }
        }
    }
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

    // ------------------------------------------------ PUBLIC ----------------------------------------------
    case "tmp":
        require_once "Views/public/accueil.php";
    break;
}