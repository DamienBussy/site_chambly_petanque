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
        require_once "Views/accueilView.php";
        break;
    // ------------------------------------------------ ADMIN ----------------------------------------------
    case "evt":
        require_once "sousIndex/public/indexEvents.php";
    break;

    // ------------------------------------------------ PUBLIC ----------------------------------------------
    case "tmp":
        require_once "Views/public/accueil.php";
        break;
}