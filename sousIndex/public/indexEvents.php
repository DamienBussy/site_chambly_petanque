<?php
use Controllers\Admin\EventController;
use Controllers\Admin\ImageController;

switch ($action) {
    case "getAllEvents":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->AfficherEventsPublic();
    break;
    case "eventDetails":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }else{
            $id=$_GET['id'];
        }
        $controller->AfficherEventDetailPublic($id);
    break;


}