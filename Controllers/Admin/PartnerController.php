<?php

namespace Controllers\Admin;
use Partner;
use Models\PartnerModel;

require_once "Models/PartnerModel.php";
require_once "Entities/Partner.php";
class PartnerController
{
    private $data;
    private $partner_model;

    public function __construct(){
        $this->data=array();
        $this->partner_model=new PartnerModel();
    }

    public function AfficherTousLesPartners(){
        $partners=$this->partner_model->GetPartners();
        $this->data['lesPartners']=$partners;

        require_once "Views/Admin/partners/gestionPartnersView.php";
    }

    public function AfficherAjoutView(){
        require_once "Views/Admin/partners/saisieAjout.php";
    }
    public function AjouterPartner($title, $link){
//        var_dump("toto");
        $photo = "resources/partners/" . $_FILES['partner_picture']['name'];
        $partner = new Partner(0, $title, $link, $photo);
        $this->uploadPhotoJoueur();
        $this->partner_model->Ajouter($partner);
        $this->AfficherTousLesPartners();
    }
    public function uploadPhotoJoueur(){
        if(isset($_FILES['partner_picture']['name'])) {
            $image_name = $_FILES['partner_picture']['name'];
            $image_tmp_name = $_FILES['partner_picture']['tmp_name'];
            $image_path = "resources/partners/" . $image_name;

            if(move_uploaded_file($image_tmp_name, $image_path)) {
                // Appel de la fonction AjouterImageForEvent() pour ajouter l'image à la base de données
                $this->data['leMessageSucces']= "L'image a été ajoutée avec succès.";
            }
        }
    }

    public function AfficherModifView($id){
        $ecole=$this->partner_model->GetPartner($id);
        $this->data['id_partner']=$id;
        $this->data['title']=$ecole->getPartnerTitre();
        $this->data['link']=$ecole->getPartnerLink();
        $this->data['picture']=$ecole->getPartnerPicture();

        require_once "Views/Admin/partners/saisieModif.php";
    }

    public function ModifierPartner($id, $title, $link){
        $partner = new Partner($id, $title, $link, null);
        $this->partner_model->Modifier($partner);
        $this->AfficherTousLesPartners();
    }

    public function SupprimerEcole($id){
        $this->partner_model->Supprimer($id);
        $this->AfficherTousLesPartners();
    }

    //    ---------------------------------------------------------------- PUBLIC ---------------------------------------------
    public function AfficherLesPartners(){
        $partners=$this->partner_model->GetPartners();
        $this->data['lesPartners']=$partners;

        require_once "Views/public/partners.php";
    }
}