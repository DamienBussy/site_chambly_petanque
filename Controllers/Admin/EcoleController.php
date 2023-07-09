<?php

namespace Controllers\Admin;

use Ecole;
use Models\EcoleModel;

require_once "Models/EcoleModel.php";
require_once "Entities/Ecole.php";

class EcoleController
{
    private $data;
    private $ecole_model;

    public function __construct(){
        $this->data=array();
        $this->ecole_model=new EcoleModel();
    }



    public function AfficherToutesLesEcoles(){
        $ecoles=$this->ecole_model->GetEcoles();
        $this->data['lesEcoles']=$ecoles;

        require_once "Views/Admin/ecole/gestionEcolesView.php";
    }

    public function AfficherAjoutView(){
        require_once "Views/Admin/ecole/saisieAjout.php";
    }
    public function AjouterEcole($title, $desc, $date){
        $ecole = new Ecole(0, $title, $desc, $date);
        $this->ecole_model->Ajouter($ecole);
        $this->AfficherToutesLesEcoles();
    }

    public function AfficherModifView($id_ecole){
        $ecole=$this->ecole_model->GetEcole($id_ecole);
        $this->data['id_ecole']=$id_ecole;
        $this->data['title']=$ecole->getEcoleTitre();
        $this->data['desc']=$ecole->getEcoleDescription();
        $this->data['date']=$ecole->getEcoleDate();

        require_once "Views/Admin/ecole/saisieModif.php";
    }

    public function ModifierEcole($id, $title, $desc, $date){
        $ecole=new Ecole($id, $title, $desc, $date);
        $this->ecole_model->Modifier($ecole);
        $this->AfficherToutesLesEcoles();
    }

    public function SupprimerEcole($id_ecole){
        $this->ecole_model->Supprimer($id_ecole);
        $this->AfficherToutesLesEcoles();
    }

//    ---------------------------------------------------------------- PUBLIC ---------------------------------------------
    public function AfficherLesEcoles(){
        $ecoles=$this->ecole_model->GetEcoles();
        $this->data['lesEcoles']=$ecoles;

        require_once "Views/public/calendrierecolepetanque.php";
    }

    public function AfficherDetails($id){
        $ecole=$this->ecole_model->GetEcole($id);
        $this->data['lesPhotos']=$this->ecole_model->GetPhotosByEcole($id);
        $this->data['theEcole']=$ecole;
        require_once "Views/public/ecoledetails.php";
    }


}