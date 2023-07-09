<?php

namespace Controllers\Admin;
use JoueurEcole;
use Models\JoueurEcoleModel;

require_once "Models/JoueurEcoleModel.php";
require_once "Entities/JoueurEcole.php";
class JoueurEcoleController
{
    private $data;
    private $joueurecole_model;

    public function __construct(){
        $this->data=array();
        $this->joueurecole_model=new JoueurEcoleModel();
    }

    public function AfficherTousLesJoueurs(){
        $joueurs=$this->joueurecole_model->GetJoueurs();
        $this->data['lesJoueurs']=$joueurs;

        require_once "Views/Admin/joueurecole/gestionJoueursView.php";
    }

    public function AfficherAjoutView(){
        require_once "Views/Admin/joueurecole/saisieAjout.php";
    }
    public function AjouterPartner($nom, $prenom){
//        var_dump("toto");
        $photo = "resources/joueurecole/" . $_FILES['joueurecole_picture']['name'];
        $joueur = new JoueurEcole(0, $nom, $prenom, $photo);
        $this->uploadPhotoJoueur();
        $this->joueurecole_model->Ajouter($joueur);
        $this->AfficherTousLesJoueurs();
    }
    public function uploadPhotoJoueur(){
        if(isset($_FILES['joueurecole_picture']['name'])) {
            $image_name = $_FILES['joueurecole_picture']['name'];
            $image_tmp_name = $_FILES['joueurecole_picture']['tmp_name'];
            $image_path = "resources/joueurecole/" . $image_name;

            if(move_uploaded_file($image_tmp_name, $image_path)) {
                // Appel de la fonction AjouterImageForEvent() pour ajouter l'image à la base de données
                $this->data['leMessageSucces']= "L'image a été ajoutée avec succès.";
            }
        }
    }

    public function AfficherModifView($id){
        $ecole=$this->joueurecole_model->GetJoueur($id);
        $this->data['id_joueurecole']=$id;
        $this->data['nom']=$ecole->getJoueurecoleNom();
        $this->data['prenom']=$ecole->getJoueurecolePrenom();

        require_once "Views/Admin/joueurecole/saisieModif.php";
    }

    public function ModifierPartner($id, $nom, $prenom){
        $joueur = new JoueurEcole($id, $nom, $prenom, null);
        $this->joueurecole_model->Modifier($joueur);
        $this->AfficherTousLesJoueurs();
    }

    public function SupprimerEcole($id){
        $this->joueurecole_model->Supprimer($id);
        $this->AfficherTousLesJoueurs();
    }

    //    ---------------------------------------------------------------- PUBLIC ---------------------------------------------
    public function AfficherLesJoueurs(){
        $joueurs=$this->joueurecole_model->GetJoueurs();
        $this->data['lesJoueurs']=$joueurs;

        require_once "Views/public/joueursecoledepetanque.php";
    }
}