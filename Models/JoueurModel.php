<?php

namespace Models;
use PDO;
use Joueur;
require_once "DatabaseModel.php";
class JoueurModel extends DatabaseModel
{
    public function GetJoueurs(){
        $listeJoueurs=array();
        $this->Connexion();
        $req="select * from joueurs order by joueur_nom asc";
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $joueur){
            $theJoueur = new Joueur($joueur['joueur_id'], $joueur['joueur_nom'], $joueur['joueur_prenom'], $joueur['joueur_login'], $joueur['joueur_photo']);
            $listeJoueurs[] = $theJoueur;
        }
        $this->Deconnexion();
        return $listeJoueurs;
    }

    public function GetJoueur($id){
        $theJoueur=null;
        $this->Connexion();
        $req="select * from joueurs where joueur_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $joueur=$res->fetch();
        if($joueur){
            $theJoueur = new Joueur($joueur['joueur_id'], $joueur['joueur_nom'], $joueur['joueur_prenom'], $joueur['joueur_login'], $joueur['joueur_photo']);
        }
        $this->Deconnexion();
        return $theJoueur;
    }

    public function Create($joueur, $password){
        // On hash le mode de passe avant de l'insérer en bdd
        $hash=password_hash($password, PASSWORD_BCRYPT);
        $this->Connexion();
        $req="insert into joueurs (joueur_nom, joueur_prenom, joueur_login, joueur_password, joueur_photo) values (:nom, :prenom, :login, :password, :photo)";
        $stmt = $this->GetDb()->prepare($req);
        $lastname=$joueur->getJoueurNom();
        $stmt->bindParam(':nom', $lastname);
        $firstname=$joueur->getJoueurPrenom();
        $stmt->bindParam(':prenom', $firstname);
        $login=$joueur->getJoueurLogin();
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $hash);
        $statut=$joueur->getJoueurPhoto();
        $stmt->bindParam(':photo', $statut);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function loginEstUnDoublonCreate($login){
        $resultat=false;
        $this->Connexion();
        $req="select joueur_login from joueurs";
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $loginCurrent){
            if($login == $loginCurrent['joueur_login']){
                $resultat=true;
                break;
            }
        }
        $this->Deconnexion();
        return $resultat;
    }

    public function loginEstUnDoublonModif($login, $id){
        $resultat=false;
        $this->Connexion();
        $req="select joueur_login from joueurs where not joueur_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $loginCurrent){
            if($login == $loginCurrent['joueur_login']){
                $resultat=true;
                break;
            }
        }
        $this->Deconnexion();
        return $resultat;
    }

    public function GetJoueurByLogin($login){
        $theJoueur=null;
        $this->Connexion();
        $req="select * from joueurs where joueur_login=:login";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':login', $login);
        $res->execute();
        // On récupère le résultat de la requête
        $joueur=$res->fetch();
        if($joueur){
            $theJoueur = new Joueur($joueur['joueur_id'], $joueur['joueur_nom'], $joueur['joueur_prenom'], $joueur['joueur_login'], $joueur['joueur_photo']);
        }
        $this->Deconnexion();
        return $theJoueur;
    }

    public function GetHashPassword($login){
        $hash=null;
        $this->Connexion();
        $req="select joueur_password from joueurs where joueur_login=:login";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':login', $login);
        $res->execute();
        $ligne=$res->fetch();
        if($ligne){
            $hash=$ligne['joueur_password'];
        }
        $this->Deconnexion();
        return $hash;
    }

    public function Modifier($theJoueur){
        $this->Connexion();
        $req="update joueurs set joueur_nom=:nom, joueur_prenom=:prenom, joueur_login=:login, joueur_photo=:photo where joueur_id=:id";
        $stmt = $this->GetDb()->prepare($req);
        $id=$theJoueur->getJoueurId();
        $nom=$theJoueur->getJoueurNom();
        $prenom=$theJoueur->getJoueurPrenom();
        $login=$theJoueur->getJoueurLogin();
        $photo=$theJoueur->getJoueurPhoto();
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function ModifierWithPassword($theJoueur, $password){
        $this->Connexion();
        $hash=password_hash($password, PASSWORD_BCRYPT);
        $req="update joueurs set joueur_nom=:nom, joueur_prenom=:prenom, joueur_login=:login, joueur_password=:password,joueur_photo=:photo where joueur_id=:id";
        $stmt = $this->GetDb()->prepare($req);
        $id=$theJoueur->getJoueurId();
        $nom=$theJoueur->getJoueurNom();
        $prenom=$theJoueur->getJoueurPrenom();
        $login=$theJoueur->getJoueurLogin();
        $photo=$theJoueur->getJoueurPhoto();
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':password', $hash);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function SupprimerPhoto($id){
        $this->Connexion();
        $req="update joueurs set joueur_photo=:photo  where joueur_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $photo=null;
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

}