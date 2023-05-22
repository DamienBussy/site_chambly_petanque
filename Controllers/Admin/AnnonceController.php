<?php

namespace Controllers\Admin;
use Annonce;
use Models\AnnonceModel;
use Models\JoueurModel;

require_once "Models/AnnonceModel.php";
require_once "Models/JoueurModel.php";
require_once "Entities/Annonce.php";
class AnnonceController
{
    private $data;
    private $annonce_model;
    private $joueur_model;

    public function __construct(){
        $this->data=array();
        $this->annonce_model=new AnnonceModel();
        $this->joueur_model=new JoueurModel();
    }

    public function AfficherToutesLesAnnonces(){
        $annonces=$this->annonce_model->GetAnnonces();
        foreach ($annonces as $ann){
            $joueur = $this->joueur_model->GetJoueur($ann->getAnnonceJoueur());
            $concatenation = $joueur->getJoueurPrenom() ." ". $joueur->getJoueurNom();
            $ann->setJoueur($concatenation);
        }
        $this->data['lesAnnonces']=$annonces;
        require_once "Views/public/joueurs/trouverunjoueur-connecte.php";
    }

    public function PublierAnnonce($title, $date, $joueur){
        $theAnnonce=new Annonce(0, $title, $date, $joueur);
        $this->annonce_model->Create($theAnnonce);
        $this->AfficherToutesLesAnnonces();
    }

    public function ModifierAnnonce($id, $title, $date){
        $theAnnonce=new Annonce($id, $title, $date, 0);
        $this->annonce_model->Modifier($theAnnonce);
        $this->AfficherToutesLesAnnonces();
    }

    public function DeleteAnnonce($idAnnonce){
        $this->annonce_model->Supprimer($idAnnonce);
        $this->AfficherToutesLesAnnonces();
    }

    public function SaisieModifierAnnonce($idAnnonce){
        $theAnnonce=$this->annonce_model->GetAnnonce($idAnnonce);
        $this->data['title']=$theAnnonce->getAnnonceTitre();
        $this->data['date']=$theAnnonce->getAnnonceDate();
        $this->data['idAnnonce']=$theAnnonce->getAnnonceId();
        require_once "Views/public/joueurs/modifierAnnonce.php";
    }
}