<?php

namespace Controllers\Admin;
use GaleryEcole;
use Models\GaleryEcoleModel;

require_once "Models/GaleryEcoleModel.php";
require_once "Entities/GaleryEcole.php";
class GaleryEcoleController
{
    private $data;
    private $galeryecole_model;

    public function __construct(){
        $this->data=array();
        $this->galeryecole_model=new GaleryEcoleModel();
    }

    public function AfficherPhotos($id_ecole){
        $this->data['id_ecole']=$id_ecole;
        $this->data['lesPhotos']=$this->galeryecole_model->GetPhotosByEcole($id_ecole);
        require_once "Views/Admin/ecole/gestionImagesEcole.php";
    }

    public function AfficherSupprimerPhotos($id_ecole){
        $this->data['id_ecole']=$id_ecole;
        $this->data['lesPhotos']=$this->galeryecole_model->GetPhotosByEcole($id_ecole);
        require_once "Views/Admin/ecole/deleteImage.php";
    }

    public function uploadImage(){
        if(isset($_FILES['image_path']['name'])) {
            $image_name = $_FILES['image_path']['name'];
            $image_tmp_name = $_FILES['image_path']['tmp_name'];
            $image_path = "resources/pictures/" . $image_name;
            $id_ecole = $_POST['id_ecole'];
            $this->data['id_ecole']=$id_ecole;

            if(move_uploaded_file($image_tmp_name, $image_path)) {
                // Appel de la fonction AjouterImageForEvent() pour ajouter l'image à la base de données
                $this->AjouterImage($image_path, $id_ecole);
                $this->data['leMessageSucces']= "L'image a été ajoutée avec succès.";
            }
            else {
                $this->data['leMessageError']="Une erreur s'est produite lors de l'upload de l'image.";
                require_once "Views/Admin/ecole/saisieAjoutPhoto.php";
            }
        }
        else {
            $this->data['id_ecole']=$_POST['id_ecole'];
            $this->data['leMessageError']="Veuillez remplir tous les champs.";
            require_once "Views/Admin/ecole/saisieAjoutPhoto.php";
        }
    }
    public function AjouterImage($path, $id_ecole){
//        $ecole=new GaleryEcole(0, $path, $id_ecole);
        $this->galeryecole_model->Ajouter($path, $id_ecole);
        $this->data['images']=$this->galeryecole_model->GetPhotosByEcole($id_ecole);
        $this->data['id_ecole']=$id_ecole;
        $this->data['leMessageSucces']= "L'image a été ajoutée avec succès.";
        require_once "Views/Admin/ecole/saisieAjoutPhoto.php";
    }

    public function AfficherAjouterPhoto($id_ecole){
        $this->data['id_ecole']=$id_ecole;
        require_once "Views/Admin/ecole/saisieAjoutPhoto.php";
    }

    public function SupprimerImage($id, $id_ecole){
        $this->galeryecole_model->Supprimer($id);
        $this->AfficherSupprimerPhotos($id_ecole);
    }
}