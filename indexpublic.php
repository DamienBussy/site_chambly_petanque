<?php

if (!empty($_POST['page']) || !empty($_GET['page']))
{

    if(!empty($_POST['page'])){
        $page=$_POST['page'];
    }
    else{
        $page=$_GET['page'];
    }

}
else {
    $page = "acc";
}

// On prend les 3 premiere lettre de $page pour connaitre notre direction
$direction = substr($page, 0, 3);
$action=substr($page, 4);
switch ($direction){
    case "acc":
        require_once "Views/public/accueil.php";
    break;
    case "evt":
        require_once "sousIndex/public/indexEvents.php";
    break;
    case "res":
        require_once "sousIndex/public/indexResultats.php";
    break;
    case "grp":
        require_once "sousIndex/public/indexGrandPrix.php";
    break;
    case "adh":
        require_once "sousIndex/public/indexAdhesion.php";
    break;
    case "lic":
        require_once "sousIndex/public/indexLicencies.php";
    break;
    case "jou":
        require_once "sousIndex/public/indexJoueurs.php";
    break;
    case "eco":
        require_once "sousIndex/public/indexEcole.php";
    break;
    case "par":
        require_once "sousIndex/public/indexPartner.php";
    break;
    case "jco":
        require_once "sousIndex/public/indexJoueurecole.php";
    break;
    case "tmp":
        require_once "Views/public/accueil.php";
    break;
}