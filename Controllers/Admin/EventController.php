<?php

namespace Controllers\Admin;

use Event;
use Models\EventModel;
use Models\ImageModel;
require_once "Models/ImageModel.php";
require_once "Models/EventModel.php";

class EventController
{
    private $data;
    private $event_model;
    private $image_model;

    public function __construct(){
        $this->data=array();
        $this->event_model=new EventModel();
        $this->image_model=new ImageModel();
    }

    public function AfficherTousLesEvents(){
        $theEvent = $this->event_model->GetEvents();
        $this->data['lesEvents']=$theEvent;
        $this->data['pathsImagePrincipale']=null;
        // On bind les paths dans les objet Event
        foreach ($theEvent as $evt){
            if(!is_null($evt->getEventImagePrincipale())){
                $evt->setPathImagePrincipale($this->image_model->getImagePrincipaleEvent($evt->getEventImagePrincipale())->getImagePath());
            }
        }
        require_once "Views/Admin/events/gestionEventsView.php";
    }

    public function AfficherAjoutView(){
        $this->data['eventEstDoublon'] = false;
        require_once "Views/Admin/events/saisieAjout.php";
    }
    public function AjouterEvent($event_title, $event_description, $event_date, $event_lieu, $event_heureDebut, $event_heureFin, $event_categorie){
        $theEvent = new Event(0, $event_title, $event_description, $event_date, $event_lieu, $event_heureDebut, $event_heureFin, null, $event_categorie);
        $this->event_model->Ajouter($theEvent);

        $this->AfficherTousLesEvents();
    }

    public function SaisieModifierEvent($id_event){
        $theEvent=$this->event_model->GetEvent($id_event);
        $this->data['id_event']=$id_event;
        $this->data['title']=$theEvent->getEventTitle();
        $this->data['desc']=$theEvent->getEventDescription();
        $this->data['date']=$theEvent->getEventDate();
        $this->data['lieu']=$theEvent->getEventLieu();
        $this->data['heureDebut']=$theEvent->getEventHeureDebut();
        $this->data['heureFin']=$theEvent->getEventHeureFin();
        $this->data['categ']=$theEvent->getEventCategorie();

        require_once "Views/Admin/events/saisieModif.php";

    }

    public function ModifierEvent($id, $event_title, $event_description, $event_date, $event_lieu, $event_heureDebut, $event_heureFin, $event_categorie){
        $theEvent = new Event($id, $event_title, $event_description, $event_date, $event_lieu, $event_heureDebut, $event_heureFin, null, $event_categorie);
        $this->event_model->Modifier($theEvent);

        $this->AfficherTousLesEvents();
    }

    public function SupprimerEvent($id){
        $this->event_model->Supprimer($id);
        header("Location: index.php?page=evt_getAllEvents");
    }

    public function AfficherGestionImagesView($id){
        $this->data['images']=$this->image_model->getImagesByEvent($id);
        $this->data['id_event']=$id;
        require_once "Views/Admin/events/gestionImagesEvent.php";
    }

    public function AfficherDeleteImagePrincipale($id){
        $this->data['images']=$this->image_model->getImagesByEvent($id);
        $this->data['id_event']=$id;
        $this->data['id_image_principale']=$this->event_model->GetImagePrincipale($id);
        require_once "Views/Admin/events/deleteImage.php";
    }
    public function SupprimerImage($id, $id_event){
        $imgPrincipale = $this->image_model->getIdImagePrincipaleEventByEventId($id_event);
        if(!is_null($imgPrincipale)){
            if($imgPrincipale == $id){
                $this->event_model->UpdateImagePrincipale(null, $id_event);
                $this->data['messageAvertissement']="Vous venez de supprimer votre premiere image.";
            }
        }
        $this->image_model->Supprimer($id);
        $this->AfficherDeleteImagePrincipale($id_event);
    }

    public function AfficherUpdateImagePrincipale($id){
        $this->data['images']=$this->image_model->getImagesByEvent($id);
        $this->data['id_event']=$id;
        $this->data['id_image_principale']=$this->event_model->GetImagePrincipale($id);
        require_once "Views/Admin/events/changeImagePrincipale.php";
    }
    public function UpdateImagePrincipale($id, $id_event){
        $this->event_model->UpdateImagePrincipale($id, $id_event);
        $this->AfficherGestionImagesView($id_event);
    }


//    ---------------------------------------------- PUBLIC -------------------------------------------------------

    public function AfficherEventsPublic(){
        $theEvent = $this->event_model->GetEvents();

        $this->data['lesEvents']=$theEvent;

        $this->data['pathsImagePrincipale']=null;
        // On bind les paths dans les objet Event
        foreach ($theEvent as $evt){
            if(!is_null($evt->getEventImagePrincipale())){
                $evt->setPathImagePrincipale($this->image_model->getImagePrincipaleEvent($evt->getEventImagePrincipale())->getImagePath());
            }
        }

        require_once "Views/public/events.php";
    }

    public function AfficherEventDetailPublic($id){
        $theEvent = $this->event_model->GetEvent($id);
        if(!is_null($theEvent->getEventImagePrincipale())){
            $theEvent->setPathImagePrincipale($this->image_model->getImagePrincipaleEvent($theEvent->getEventImagePrincipale())->getImagePath());
        }
        $this->data['theEvent']=$theEvent;
        require_once "Views/public/eventdetails.php";
    }


}