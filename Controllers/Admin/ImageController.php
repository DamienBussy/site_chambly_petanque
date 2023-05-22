<?php

namespace Controllers\Admin;

use Image;
use Models\EventModel;
use Models\ImageModel;
require_once "Models/ImageModel.php";
require_once "Models/EventModel.php";
class ImageController
{
    private $data;
    private $event_model;
    private $image_model;

    public function __construct(){
        $this->data=array();
        $this->event_model=new EventModel();
        $this->image_model=new ImageModel();
    }

    public function AfficherSaisieAjoutImageForEvent($id_event){
        $this->data['id_event']=$id_event;
        require_once "Views/Admin/images/saisieAjoutEvent.php";
    }

    public function uploadImage(){
        if(isset($_FILES['image_path']['name'])) {
            $image_name = $_FILES['image_path']['name'];
            $image_tmp_name = $_FILES['image_path']['tmp_name'];
            $image_path = "resources/pictures/" . $image_name;
            $id_event = $_POST['id'];
            $this->data['id_event']=$id_event;

            if(move_uploaded_file($image_tmp_name, $image_path)) {
                // Appel de la fonction AjouterImageForEvent() pour ajouter l'image à la base de données
                $this->AjouterImageForEvent($image_name, $id_event);
                $this->data['leMessageSucces']= "L'image a été ajoutée avec succès.";
            }
            else {
                $this->data['leMessageError']="Une erreur s'est produite lors de l'upload de l'image.";
                require_once "Views/Admin/images/saisieAjoutEvent.php";
            }
        }
        else {
            $this->data['id_event']=$_POST['id'];
            $this->data['leMessageError']="Veuillez remplir tous les champs.";
            require_once "Views/Admin/images/saisieAjoutEvent.php";
        }
    }
    public function AjouterImageForEvent($path, $event_id){
        $this->image_model->Ajouter($path, $event_id);
        $this->data['images']=$this->image_model->getImagesByEvent($event_id);
        $this->data['id_event']=$event_id;
        $this->data['leMessageSucces']= "L'image a été ajoutée avec succès.";
        require_once "Views/Admin/images/saisieAjoutEvent.php";
    }

    public function AfficherSaisieAjoutImageForResultat($id_resultat){
        $this->data['id_resultat']=$id_resultat;
        require_once "Views/Admin/images/saisieAjoutResultat.php";
    }
    public function AjouterImageForResultat($path, $resultat_id){
        $this->image_model->AjouterForResultat($path, $resultat_id);
        $this->data['images']=$this->image_model->getImagesByResultat($resultat_id);
        $this->data['id_resultat']=$resultat_id;
        $this->data['leMessageSucces']= "L'image a été ajoutée avec succès.";
        require_once "Views/Admin/images/saisieAjoutResultat.php";
    }
    public function uploadImageResultat(){
        if(isset($_FILES['image_path']['name'])) {
            $image_name = $_FILES['image_path']['name'];
            $image_tmp_name = $_FILES['image_path']['tmp_name'];
            $image_path = "resources/pictures/" . $image_name;
            $id_resultat = $_POST['id'];
            $this->data['id_resultat']=$id_resultat;

            if(move_uploaded_file($image_tmp_name, $image_path)) {
                // Appel de la fonction AjouterImageForEvent() pour ajouter l'image à la base de données
                $this->AjouterImageForResultat($image_name, $id_resultat);
                $this->data['leMessageSucces']= "L'image a été ajoutée avec succès.";
            }
            else {
                $this->data['leMessageError']="Une erreur s'est produite lors de l'upload de l'image.";
                require_once "Views/Admin/images/saisieAjoutResultat.php";
            }
        }
        else {
            $this->data['id_event']=$_POST['id'];
            $this->data['leMessageError']="Veuillez remplir tous les champs.";
            require_once "Views/Admin/images/saisieAjoutResultat.php";
        }
    }
}