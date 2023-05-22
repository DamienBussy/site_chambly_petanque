<?php

namespace Models;

use ExceptionConnexion;
use PDO;
require_once "DatabaseModel.php";
class GrandPrixModel extends DatabaseModel
{
    public function GetAffiche(){
        $affiche=null;
        $this->Connexion();
        $req="select * from grandprix";
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $gp=$res->fetch();
        if($gp){
            $affiche = $gp['grandprix_affiche'];
        }
        $this->Deconnexion();
        return $affiche;
    }

    public function AjouterAffiche($affiche){
        $this->Connexion();
        $req="insert into grandprix (grandprix_affiche) values (:affiche)";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('affiche', $affiche);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function truncateTable(){
        $this->Connexion();
        $req="truncate table grandprix";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->execute();
        $this->Deconnexion();
    }
}