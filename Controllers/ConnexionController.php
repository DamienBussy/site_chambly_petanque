<?php

namespace Controllers;

//use Models\UserModel;
use Models\UserModel;
use User;
use UserMail;

require_once "Models/UserModel.php";
require_once "utils/UserMail.php";
class ConnexionController
{
    private $idUserCurrent;
    private $data;
    private $user_model;

    public function __construct(){
        $this->data=array();
        $this->user_model=new UserModel();
    }

    public function SaisirLogin($login){
        $this->data['login']=$login;
        require_once "Views/connexionView.php";
    }

    public function Connecter($login, $password, $hauteurEcran){
        $theUser=$this->user_model->GetUserByLogin($login);

        if(is_null($theUser)){
            $this->data['message']="Utilisateur inconnu.";
            require_once "Views/connexion_errorView.php";
        }
        else{
            // On récupère le mot de passe de l'utilisateur "login" en bdd pour ensuite le comparer au mot de pass rentré dans le formulaire (avec password_verify)
            $hash = $this->user_model->GetHashPassword($login);
//            $test = password_hash($password, PASSWORD_BCRYPT);
            if(password_verify($password, $hash)){
                $_SESSION['users']=$theUser;
                $_SESSION['hauteurEcan']=$hauteurEcran;
                header("Location: index.php?page=men_menuAdmin");
            } else{
                $this->data['message']="Votre mot de passe est incorrecte.";
                require_once "Views/connexion_errorView.php";
            }
        }
    }
    public function Deconnecter()
    {
        session_unset();
//        require_once "Views/accueilView.php";
        header("Location: index.php?page=cnx_pageCnx");
    }

    // Gestion mot de passe

    public function StockIdUserConnect($idUserConnect){
        $this->data['idUserConnect']=$idUserConnect;
        require_once "Views/Admin/users/changemdp.php";
    }
    public function ChangerPassword($idUserConnect, $passwordActuel, $newPassword, $newPasswordconfirme){
        $theUser=$this->user_model->GetUser($idUserConnect);
        $this->data['idUserConnect'] = $idUserConnect;
        $hashActuel = $this->user_model->GetHashPasswordById($idUserConnect);
        // Securité
        if(password_verify($passwordActuel, $hashActuel)){
            if($newPassword != $newPasswordconfirme){
                $this->data['leMessageError'] = "Les saisies sont différentes";
                require_once "Views/Admin/users/changemdp.php";
            }
            else{
//                $code = uniqid();
//                $this->user_model->ConfirmerByEmail($idUserConnect, $code, $newPassword);
                // Envoie de l'email
//                $destinataireMail = $theUser->getUserEmail();
//                $sujet="Changement de Mot de passe Espace Admin chambly petanque";
//                $message = "Bonjour,\n\n";
//                $message .= "Pour confirmer votre demande de changement de mot de passe, veuillez cliquer sur le lien ci-dessous :\n";
//                $message .= "http://localhost:7080/cp/accueil.php?page=mdp&id=".$idUserConnect."&code=".$code;
//                $message .= "\n\n";
//                $message .= "Ce lien sera valable pendant une heure.\n\n";
//                $message=utf8_decode($message);
//                $mail = new UserMail();
//                $mail->EnvoyerMail($destinataireMail, $sujet, $message);
//                $this->data['leMessage']="Un mail vous a été envoyé, consultez-le et cliquez sur le lien de confirmation le changement de mot passe.";
                $hash=password_hash($newPassword, PASSWORD_BCRYPT);
                $this->user_model->ChangerPassword($hash, $idUserConnect);
                $this->data['leMessage'] = "Votre mot de passe a été modifié avec succès.";
                require_once "Views/Admin/users/changemdp.php";
            }
        }
        else{
            $this->data['leMessageError']="L'authentification avec votre mot de passe actuel n'est pas correcte.";
            require_once "Views/Admin/users/changemdp.php";
        }
    }

    public function actionValidationChangementPassword($id, $code)
    {
        $password = $this->user_model->GetPasswordWithEmail($id);
        if (!is_null($password)) {
            $confirmation_email = $this->user_model->GetConfirmationEmailByUserId($id);
            if ($confirmation_email['expiration_date'] <= date('Y-m-d H:i:s') && $confirmation_email['code'] == $code) {
                $this->user_model->ChangerPassword($password, $id);
                $this->data['leMessage'] = "Votre mot de passe a été modifié avec succès.";
            } else {
                $this->data['leMessage'] = "Le lien de confirmation a expiré ou est invalide.";
            }
        } else {
            $this->data['leMessageError'] = "Le lien de confirmation est invalide.";
        }
        require_once "Views/passwordUpdated.php";
    }

}