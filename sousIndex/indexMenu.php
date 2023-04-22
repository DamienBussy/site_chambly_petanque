<?php

use Controllers\Admin\MenuAdminController;
use Controllers\Admin\MenuPresidentController;

switch ($action){
    case "menuAdmin":
        require_once "Controllers/Admin/MenuAdminController.php";
        $controller=new MenuAdminController();
        $controller->Afficher();
}