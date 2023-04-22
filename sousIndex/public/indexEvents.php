<?php
use Controllers\Admin\EventController;
use Controllers\Admin\ImageController;

switch ($action) {
    case "getAllEvents":
        require_once "Controllers/Admin/EventController.php";
        $controller = new EventController();
        $controller->AfficherEventsPublic();
    break;


}