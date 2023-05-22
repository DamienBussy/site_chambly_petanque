<?php

namespace Models;

use Annonce;
use DateTime;
use PDO;
require_once "Entities/Annonce.php";
require_once "DatabaseModel.php";
class AnnonceModel extends DatabaseModel
{
    public function GetAnnonces(){
        $listeAnnonces=array();
        $this->Connexion();
        $req="select * from annonces order by annonce_date";
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        $dateActuelle = new DateTime();
        foreach($line as $annonce){
            $annonce_date = $annonce['annonce_date'];
            $annonce_date_obj = new DateTime($annonce_date);

            // Comparer les dates en ignorant l'heure
            $annonce_date_obj->setTime(0, 0, 0);
            $dateActuelle->setTime(0, 0, 0);

            if($annonce_date_obj < $dateActuelle){
                $this->Supprimer($annonce['annonce_id']);
            }else{
                $theAnnonce = new Annonce($annonce['annonce_id'], $annonce['annonce_titre'], $annonce['annonce_date'], $annonce['annonce_joueur']);
                $listeAnnonces[] = $theAnnonce;
            }
        }

        $this->Deconnexion();
        return $listeAnnonces;
    }

    public function GetAnnonce($id){
        $theAnnonce=null;
        $this->Connexion();
        $req="select * from annonces where annonce_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $annonce=$res->fetch();
        if($annonce){
            $theAnnonce = new Annonce($annonce['annonce_id'], $annonce['annonce_titre'], $annonce['annonce_date'], $annonce['annonce_joueur']);
        }
        $this->Deconnexion();
        return $theAnnonce;
    }

    public function Create($annonce){
        $this->Connexion();
        $req="insert into annonces (annonce_titre, annonce_date, annonce_joueur) values (:titre, :date, :joueur)";
        $stmt = $this->GetDb()->prepare($req);
        $titre=$annonce->getAnnonceTitre();
        $stmt->bindParam(':titre', $titre);
        $date=$annonce->getAnnonceDate();
        $stmt->bindParam(':date', $date);
        $joueur=$annonce->getAnnonceJoueur();
        $stmt->bindParam(':joueur', $joueur);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Modifier($annonce){
        $this->Connexion();
        $req="update annonces set annonce_titre=:titre, annonce_date=:date where annonce_id=:id";
        $stmt = $this->GetDb()->prepare($req);
        $titre=$annonce->getAnnonceTitre();
        $stmt->bindParam(':titre', $titre);
        $date=$annonce->getAnnonceDate();
        $stmt->bindParam(':date', $date);
        $id=$annonce->getAnnonceId();
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from annonces where annonce_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }
}