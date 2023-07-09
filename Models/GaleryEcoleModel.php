<?php

namespace Models;

use GaleryEcole;
use PDO;
require_once "Entities/GaleryEcole.php";
require_once "DatabaseModel.php";

class GaleryEcoleModel extends DatabaseModel
{
    public function GetPhotosByEcole($id_ecole){
        $listePhotos=array();
        $this->Connexion();
        $req="select * from galeryecole where galeryecole_ecole=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id_ecole);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $ecole){
            $theGaleryEcole = new GaleryEcole($ecole['galeryecole_id'], $ecole['galeryecole_path'], $ecole['galeryecole_ecole']);
            $listePhotos[] = $theGaleryEcole;
        }
        $this->Deconnexion();
        return $listePhotos;
    }

    public function GetPhoto($id){
        $theGaleryEcole=null;
        $this->Connexion();
        $req="select * from galeryecole where galeryecole_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $ecole=$res->fetch();
        if($ecole){
            $theGaleryEcole = new GaleryEcole($ecole['galeryecole_id'], $ecole['galeryecole_path'], $ecole['galeryecole_ecole']);
        }
        $this->Deconnexion();
        return $theGaleryEcole;
    }

    public function Ajouter($path, $ecole){
        $this->Connexion();
        $req="insert into galeryecole (galeryecole_path, galeryecole_ecole) values (:path, :ecole)";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam(':path', $path);
        $stmt->bindParam(':ecole', $ecole);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from galeryecole where galeryecole_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }
}