<?php

namespace Controllers\Admin;
use Models\AdhesionModel;
require_once "Models/AdhesionModel.php";
require_once "Controllers/Admin/LogController.php";
class AdhesionController
{
    private $data;
    private $fichier_model;
    private $log;

    public function __construct(){
        $this->data=array();
        $this->fichier_model=new AdhesionModel();
        $this->log=new LogController();
    }
    public function AfficheGestionInscription(){
        $this->data['messsageError1']=null;
        $this->data['messsageSucces1']=null;
        $this->data['messsageError2']=null;
        $this->data['messsageSucces2']=null;
        $this->data['messsageError3']=null;
        $this->data['messsageSucces3']=null;
        $this->data['messsageError4']=null;
        $this->data['messsageSucces4']=null;
        $fichierInscription=$this->fichier_model->GetFichier(1);
        $this->data['leFichierFICHEINSCRIPTION']=$fichierInscription;
        $fichierAutoPar=$this->fichier_model->GetFichier(2);
        $this->data['leFichierAUTORISATIONPARENTAl']=$fichierAutoPar;
        $fichierCertif=$this->fichier_model->GetFichier(3);
        $this->data['leFichierCERTIFICATMEDICAL']=$fichierCertif;
        $fichierTarif=$this->fichier_model->GetFichier(4);
        $this->data['leFichierTARIF']=$fichierTarif;
        require_once "Views/Admin/fichiers/gestionFichiers.php";
    }

    public function uploadFichier($id){
        $messsageError=null;
        $messsageSucces=null;
        $this->data['messsageError1']=null;
        $this->data['messsageSucces1']=null;
        $this->data['messsageError2']=null;
        $this->data['messsageSucces2']=null;
        $this->data['messsageError3']=null;
        $this->data['messsageSucces3']=null;
        $this->data['messsageError4']=null;
        $this->data['messsageSucces4']=null;
        if(isset($_POST['submit'])){
            $target_dir = "resources/adhesion/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Vérifie si le fichier est un fichier PDF
            if($imageFileType != "pdf") {
                $messsageError="Seuls les fichiers PDF sont autorisés.";
                $uploadOk = 0;
            }
            // Vérifie si le fichier a été téléchargé correctement
            if ($uploadOk == 0) {
                $messsageError= "Le fichier n'a pas pu être téléchargé.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $messsageSucces= "Le fichier ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a été téléchargé.";
                    $this->fichier_model->AjouterFichier($_FILES["fileToUpload"]["name"], $id);
                    $this->log->AjouterLogs($_SESSION['users']->getUserEmail(), "Remplacement d'un fichier de la page inscription.");
                } else {
                    $messsageError= "Une erreur est survenue lors du téléchargement du fichier.";
                }
            }
        }
        if($id == 1){
            $this->data['messsageError1']=$messsageError;
            $this->data['messsageSucces1']=$messsageSucces;
        }elseif ($id==2){
            $this->data['messsageError2']=$messsageError;
            $this->data['messsageSucces2']=$messsageSucces;
        }
        elseif ($id==3){
            $this->data['messsageError3']=$messsageError;
            $this->data['messsageSucces3']=$messsageSucces;
        }
        elseif ($id==4){
            $this->data['messsageError4']=$messsageError;
            $this->data['messsageSucces4']=$messsageSucces;
        }
        $fichierInscription=$this->fichier_model->GetFichier(1);
        $this->data['leFichierFICHEINSCRIPTION']=$fichierInscription;
        $fichierAutoPar=$this->fichier_model->GetFichier(2);
        $this->data['leFichierAUTORISATIONPARENTAl']=$fichierAutoPar;
        $fichierCertif=$this->fichier_model->GetFichier(3);
        $this->data['leFichierCERTIFICATMEDICAL']=$fichierCertif;
        $fichierTarif=$this->fichier_model->GetFichier(4);
        $this->data['leFichierTARIF']=$fichierTarif;
        require_once "Views/Admin/fichiers/gestionFichiers.php";
    }

    public function AfficherFichierInscription(){
        $fichier=$this->fichier_model->GetFichier(1);
        $pdf_path = "resources/adhesion/" . $fichier;
        $this->data['pdf_path']=$pdf_path;
        require_once "Views/public/grandprix.php";
    }
    public function AfficherFichierAutorisationParentale(){
        $fichier=$this->fichier_model->GetFichier(2);
        $pdf_path = "resources/adhesion/" . $fichier;
        $this->data['pdf_path']=$pdf_path;
        require_once "Views/public/grandprix.php";
    }
    public function AfficherFichierCertificatMedical(){
        $fichier=$this->fichier_model->GetFichier(3);
        $pdf_path = "resources/adhesion/" . $fichier;
        $this->data['pdf_path']=$pdf_path;
        require_once "Views/public/grandprix.php";
    }
    public function AfficherFichierTarifLicencie(){
        $fichier=$this->fichier_model->GetFichier(4);
        $pdf_path = "resources/adhesion/" . $fichier;
        $this->data['pdf_path']=$pdf_path;
        require_once "Views/public/grandprix.php";
    }
}