<?php

namespace Models;

use PDO;
use JoueurEcole;
require_once "Entities/JoueurEcole.php";
require_once "DatabaseModel.php";
class JoueurEcoleModel extends DatabaseModel
{
    public function GetJoueurs(){
        $listeJoueur=array();
        $this->Connexion();
        $req="select * from joueurecole";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->execute();
        $line=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $joueur){
            $theJoueur = new JoueurEcole($joueur['joueurecole_id'], $joueur['joueurecole_nom'], $joueur['joueurecole_prenom'], $joueur['joueurecole_photo']);
            $listeJoueur[] = $theJoueur;
        }
        $this->Deconnexion();
        return $listeJoueur;
    }

    public function GetJoueur($id){
        $theJoueur=null;
        $this->Connexion();
        $req="select * from joueurecole where joueurecole_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $line=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $joueur){
            $theJoueur = new JoueurEcole($joueur['joueurecole_id'], $joueur['joueurecole_nom'], $joueur['joueurecole_prenom'], $joueur['joueurecole_photo']);
        }
        $this->Deconnexion();
        return $theJoueur;
    }


    public function Ajouter($joueur){
        $this->Connexion();
        $req="insert into joueurecole (joueurecole_nom, joueurecole_prenom, joueurecole_photo) values (:nom, :prenom, :picture)";
        $stmt=$this->GetDb()->prepare($req);
        $nom = $joueur->getJoueurecoleNom();
        $prenom = $joueur->getJoueurecolePrenom();
        $picture = $joueur->getJoueurecolePhoto();
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':picture', $picture);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Modifier($joueur){
        $this->Connexion();
        $req="update joueurecole set joueurecole_nom=:nom, joueurecole_prenom=:prenom where joueurecole_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $id=$joueur->getJoueurecoleId();
        $nom = $joueur->getJoueurecoleNom();
        $prenom = $joueur->getJoueurecolePrenom();
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from joueurecole where joueurecole_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }
}