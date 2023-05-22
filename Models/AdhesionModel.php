<?php

namespace Models;
require_once "DatabaseModel.php";
class AdhesionModel extends DatabaseModel
{
    public function GetFichier($id){
        $fichier=null;
        $this->Connexion();
        $req="select * from fichiers where fichier_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam('id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $fi=$res->fetch();
        if($fi){
            $fichier = $fi['fichier_nom'];
        }
        $this->Deconnexion();
        return $fichier;
    }

    public function AjouterFichier($fichier, $id){
        $this->Connexion();
        $req="update fichiers set fichier_nom=:nom where fichier_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('nom', $fichier);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

}