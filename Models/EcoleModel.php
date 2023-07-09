<?php

namespace Models;

use PDO;
use Ecole;
require_once "Entities/Ecole.php";
require_once "DatabaseModel.php";

class EcoleModel extends DatabaseModel
{
    public function GetEcoles(){
        $listeEcoles=array();
        $this->Connexion();
        $req="select * from ecoles order by ecole_date desc";
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $ecole){
            $theEcole = new Ecole($ecole['ecole_id'], $ecole['ecole_titre'], $ecole['ecole_description'], $ecole['ecole_date']);
            $listeEcoles[] = $theEcole;
        }
        $this->Deconnexion();
        return $listeEcoles;
    }

    public function GetEcole($id){
        $theEcole=null;
        $this->Connexion();
        $req="select * from ecoles where ecole_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $ecole=$res->fetch();
        if($ecole){
            $theEcole = new Ecole($ecole['ecole_id'], $ecole['ecole_titre'], $ecole['ecole_description'], $ecole['ecole_date']);
        }
        $this->Deconnexion();
        return $theEcole;
    }

    public function Ajouter($ecole){
        $this->Connexion();
        $req="insert into ecoles (ecole_titre, ecole_description, ecole_date) values (:title, :desc, :date)";
        $stmt=$this->GetDb()->prepare($req);
        $title = $ecole->getEcoleTitre();
        $desc = $ecole->getEcoleDescription();
        $date = $ecole->getEcoleDate();
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Modifier($ecole){
        $this->Connexion();
        $req="update ecoles set ecole_titre=:title, ecole_description=:desc, ecole_date=:date where ecole_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $id = $ecole->getEcoleId();
        $title = $ecole->getEcoleTitre();
        $desc = $ecole->getEcoleDescription();
        $date = $ecole->getEcoleDate();
        $stmt->bindParam('id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from ecoles where ecole_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function GetPhotosByEcole($id_ecole){
        $listePhotos=array();
        $this->Connexion();
        $req="select galeryecole_path from galeryecole where galeryecole_ecole=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id_ecole);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $ecole){
            $listePhotos[] = $ecole['galeryecole_path'];
        }
        $this->Deconnexion();
        return $listePhotos;
    }
}