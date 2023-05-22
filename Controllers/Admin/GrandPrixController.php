<?php

namespace Controllers\Admin;

use Models\GrandPrixModel;
require_once "Models/GrandPrixModel.php";

class GrandPrixController
{
    private $data;
    private $gp_model;

    public function __construct(){
        $this->data=array();
        $this->gp_model=new GrandPrixModel();
    }
    public function AfficheGestionGrandPrix(){
        $affiche=$this->gp_model->GetAffiche();
        $this->data['laAffiche']=$affiche;
        require_once "Views/Admin/grandprix/gestionGrandprix.php";
    }
    public function AfficheGrandPrix(){
        $affiche=$this->gp_model->GetAffiche();
        $pdf_path = "resources/grandprix/" . $affiche;
        $this->data['pdf_path']=$pdf_path;
        require_once "Views/public/grandprix.php";
    }

    public function uploadAffiche(){
        if(isset($_POST['submit'])){
            $target_dir = "resources/grandprix/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Vérifie si le fichier est un fichier PDF
            if($imageFileType != "pdf") {
                $this->data['messsageError']="Seuls les fichiers PDF sont autorisés.";
                $uploadOk = 0;
            }

            // Vérifie si le fichier a été téléchargé correctement
            if ($uploadOk == 0) {
                $this->data['messsageError']= "Le fichier n'a pas pu être téléchargé.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $this->data['messsageSucces']= "Le fichier ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a été téléchargé.";
                    $this->gp_model->truncateTable();
                    $this->gp_model->AjouterAffiche($_FILES["fileToUpload"]["name"]);
                } else {
                    $this->data['messsageError']= "Une erreur est survenue lors du téléchargement du fichier.";
                }
            }
        }
        $affiche=$this->gp_model->GetAffiche();
        $this->data['laAffiche']=$affiche;
        require_once "Views/Admin/grandprix/gestionGrandprix.php";
    }
}