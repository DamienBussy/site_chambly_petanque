<?php

namespace Controllers\Admin;

use Models\JoueurModel;
use Joueur;
require_once "Entities/Joueur.php";
require_once "Models/JoueurModel.php";

class JoueurController
{
    private $data;
    private $joueur_model;

    public function __construct(){
        $this->data=array();
        $this->joueur_model=new JoueurModel();
    }

    public function AfficherTousLesJoueurs(){
        $this->data['lesJoueurs']=$this->joueur_model->GetJoueurs();
//        require_once "Views/Admin/users/gestionUsersView.php";
    }

    public function AfficherTableauBordJoueurConnecte($id){
        $_SESSION['joueurs']=$this->joueur_model->GetJoueur($id);
        $this->AfficherMonCompte($_SESSION['joueurs']->getJoueurId());
    }

    public function CreateAccount($nom, $prenom, $login, $password){
        if($this->joueur_model->loginEstUnDoublonCreate($login)){

        }else{
            if($_FILES['joueur_photo']['name'] != ''){
                $photo = "resources/joueurs/" . $_FILES['joueur_photo']['name'];
            }else{
                $photo=null;
            }
            $theJoueur = new Joueur(0, $nom, $prenom, $login, $photo);
            $this->uploadPhotoJoueur();
            $this->joueur_model->Create($theJoueur, $password);
            $this->SeConnecter($login, $password);

        }
    }

    public function uploadPhotoJoueur(){
        if(isset($_FILES['joueur_photo']['name'])) {
            $image_name = $_FILES['joueur_photo']['name'];
            $image_tmp_name = $_FILES['joueur_photo']['tmp_name'];
            $image_path = "resources/comptes/" . $image_name;

            if(move_uploaded_file($image_tmp_name, $image_path)) {
                // Appel de la fonction AjouterImageForEvent() pour ajouter l'image à la base de données
                $this->data['leMessageSucces']= "L'image a été ajoutée avec succès.";
            }
        }
    }

    public function SeConnecter($login, $password){
        $theJoueur=$this->joueur_model->GetJoueurByLogin($login);
        var_dump('toto');
        if(is_null($theJoueur)){
            $this->data['message']="Utilisateur inconnu.";
            require_once "Views/public/joueurs/connexion_errorView.php";
        }
        else{
            // On récupère le mot de passe de l'utilisateur "login" en bdd pour ensuite le comparer au mot de pass rentré dans le formulaire (avec password_verify)
            $hash = $this->joueur_model->GetHashPassword($login);
//            $test = password_hash($password, PASSWORD_BCRYPT);
//            die(var_dump($test));
            if(password_verify($password, $hash)){
                $_SESSION['joueurs']=$theJoueur;
                header("Location: indexpublic.php?page=jou_joueurconnecte&session=".$theJoueur->getJoueurId());
            } else{
                var_dump('toto');
                $this->data['message']="Votre mot de passe est incorrecte.";
                require_once "Views/public/joueurs/connexion_errorView.php";
            }
        }
    }

    public function ModifierJoueurSansModifPhoto($id, $nom, $prenom, $login, $passwordActuel, $password, $passwordConfirm){
        $photo=$this->joueur_model->GetJoueur($id)->getJoueurPhoto();
        $theJoueur=new Joueur($id, $nom, $prenom, $login, $photo);
        if(empty($passwordActuel)){
            $this->joueur_model->Modifier($theJoueur);
//            $this->data['joueur']=$theJoueur;
            $this->AfficherTableauBordJoueurConnecte($id);
        } else{
            $hash = $this->joueur_model->GetHashPassword($theJoueur->getJoueurLogin());
            if(password_verify($passwordActuel, $hash)){
                if($password==$passwordConfirm){
                    $this->joueur_model->ModifierWithPassword($theJoueur, $password);
                }
                else{
                    $this->data['error']="Vous n'avez pas mis les même mots de passe.";
                    $this->AfficherSaisieModifierJoueur($id);
                }
            } else{
                $this->data['error']="Le mot de passe n'est pas bon.";
                $this->AfficherSaisieModifierJoueur($id);
            }
        }
    }
    public function ModifierJoueur($id, $nom, $prenom, $login, $passwordActuel, $password, $passwordConfirm){
        if($_FILES['joueur_photo']['name'] != ''){
            $photo = "resources/comptes/" . $_FILES['joueur_photo']['name'];
        }else{
            $photo=null;
        }
        $theJoueur=new Joueur($id, $nom, $prenom, $login, $photo);
        $this->uploadPhotoJoueur();

        if(empty($passwordActuel)){
            $this->joueur_model->Modifier($theJoueur);
//            $this->data['joueur']=$theJoueur;
            $this->AfficherTableauBordJoueurConnecte($id);
        } else{
            $hash = $this->joueur_model->GetHashPassword($theJoueur->getJoueurLogin());
            if(password_verify($passwordActuel, $hash)){
                if($password==$passwordConfirm){
                    $this->joueur_model->ModifierWithPassword($theJoueur, $password);
                }
                else{
                    $this->data['error']="Vous n'avez pas mis les même mots de passe.";
                    $this->AfficherSaisieModifierJoueur($id);
                }
            } else{
                $this->data['error']="Le mot de passe n'est pas bon.";
                $this->AfficherSaisieModifierJoueur($id);
            }
        }

    }

    public function AfficherMonCompte($id){
        $theJoueur=$this->joueur_model->GetJoueur($id);
        $this->data['id']=$theJoueur->getJoueurId();
        $this->data['nom']=$theJoueur->getJoueurNom();
        $this->data['prenom']=$theJoueur->getJoueurPrenom();
        $this->data['login']=$theJoueur->getJoueurLogin();
        $this->data['photo']=$theJoueur->getJoueurPhoto();
//        var_dump($this->joueur_model->GetHashPassword($theJoueur->getJoueurLogin()));
        $this->data['password']=$this->joueur_model->GetHashPassword($theJoueur->getJoueurLogin());

        require_once "Views/public/joueurs/moncompte.php";

    }

    public function AfficherSaisieModifierJoueur($id){
        $theJoueur=$this->joueur_model->GetJoueur($id);
        $this->data['id']=$theJoueur->getJoueurId();
        $this->data['nom']=$theJoueur->getJoueurNom();
        $this->data['prenom']=$theJoueur->getJoueurPrenom();
        $this->data['login']=$theJoueur->getJoueurLogin();
        $this->data['photo']=$theJoueur->getJoueurPhoto();
        $this->data['password']=$this->joueur_model->GetHashPassword($theJoueur->getJoueurLogin());

        require_once "Views/public/joueurs/modifiermoncompte.php";
    }

    public function SupprimerPhoto($id){
        $this->joueur_model->SupprimerPhoto($id);
        $this->AfficherSaisieModifierJoueur($id);
    }




}