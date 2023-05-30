<?php

namespace Controllers\Admin;

use Exception;
use Models\UserModel;
use User;

require_once "Models/UserModel.php";

class UserController
{
    private $data;
    private $user_model;

    public function __construct(){
        $this->data=array();
        $this->user_model=new UserModel();
    }

    public function AfficherTousLesAdmin(){
        $this->data['lesAdmin']=$this->user_model->GetUsers();
        require_once "Views/Admin/users/gestionUsersView.php";
    }

    public function AfficherAjoutView(){
        $this->data['loginEstDoublon'] = false;
        require_once "Views/Admin/users/saisieAjout.php";
    }
    public function AjouterAdmin($lastname, $firstname, $email, $login, $password, $statut){
        $this->data['loginEstDoublon'] = false;
        $user = new User(0, $lastname, $firstname, $email, $login, $statut);
        $this->user_model->Ajouter($user, $password);

        $this->AfficherTousLesAdmin();
    }

    public function VerifAjout($lastname, $firstname, $email, $login, $password, $statut){
        if(!$this->user_model->loginEstUnDoublonAjout($login)){
            $this->AjouterAdmin($lastname, $firstname, $email, $login, $password, $statut);
        }
        else{
            $this->data['loginEstDoublon'] = true;
            require_once "Views/Admin/users/saisieAjout.php";
        }
    }

    public function AfficherModifView(){
        $this->data['loginEstDoublon'] = false;
        require_once "Views/Admin/users/saisieUpdate.php";
    }
    public function VerifModif($id, $lastname, $firstname, $email, $login, $statut){
        if(!$this->user_model->loginEstUnDoublonModif($login, $id)){
            $this->ModifierAdmin($id, $lastname, $firstname, $email, $login, $statut);
        }
        else{
            $this->data['loginEstDoublon'] = true;
            // On recharcge la page avec les infos de l'user qui n'a pas changé
            $this->data['leUser']=$this->user_model->GetUser($id);
            require_once "Views/Admin/users/saisieUpdate.php";
        }
    }

    public function ModifierAdmin($id, $lastname, $firstname, $email, $login, $statut){
        $this->data['loginEstDoublon'] = false;
        $user=new User($id, $lastname, $firstname, $email, $login, $statut);
        // Le président ne peut pas modifier le mdp d'un admin
        $this->user_model->Modifier($user);

        $this->AfficherTousLesAdmin();
    }

    public function GetUserById($id){
        $this->data['leUser']=$this->user_model->GetUser($id);
        $this->data['loginEstDoublon'] = false;
        require_once "Views/Admin/users/saisieUpdate.php";
    }

    public function SupprimerAdmin($id){
        // Le président ne peut pas être supprimer
        if($this->user_model->estPresident($id) == false){
            $this->user_model->Supprimer($id);

            $this->AfficherTousLesAdmin();
        }
    }

    public function AfficherDegraderView($message){
        $this->data['leMessageError']=$message;
        $this->data['lesAdmin']=$this->user_model->GetUsers();
        require_once "Views/Admin/users/saisieNouveauPresident.php";
    }
    public function VerifIdPresidents($idNouveauPresident){
        if(!is_null($idNouveauPresident)){
            $idPresidentCourrant = $this->user_model->getIdPresident();
            if($idPresidentCourrant == $idNouveauPresident){
                $this->AfficherDegraderView("Rien n'a changé vous vous êtes sélectionné.");
            } else{
                $this->DegraderLePresident($idPresidentCourrant, $idNouveauPresident);
            }
        }
        else{
            $this->AfficherDegraderView("Vous n'avez selectionné personne.");
        }
    }
    public function DegraderLePresident($idPresidentCourrant, $idNouveauPresident){
        $this->user_model->Degrader($idPresidentCourrant, $idNouveauPresident);
        $this->Deconnecter();
    }

    public function Deconnecter(){
        session_unset();
        header("Location: index.php?page=cnx_pageCnx");
    }
}