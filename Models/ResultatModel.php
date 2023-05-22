<?php

namespace Models;

use PDO;
use Resultat;
require_once "Entities/Resultat.php";
require_once "DatabaseModel.php";

class ResultatModel extends DatabaseModel
{
    public function GetResultats(){
        $listeResultat=array();
        $this->Connexion();
        $req="select * from resultats order by resultat_date desc"; // Le tri : du plus récent au plus ancien
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $resultat){
            $theResultat = new Resultat($resultat['resultat_id'], $resultat['resultat_title'], $resultat['resultat_description'], $resultat['resultat_date'], $resultat['resultat_imagePrincipale'], $resultat['resultat_categorie'], $resultat['resultat_annee']);
            $listeResultat[] = $theResultat;
        }
        $this->Deconnexion();
        return $listeResultat;
    }

    public function GetResultat($id){
        $theResultat=null;
        $this->Connexion();
        $req="select * from resultats where resultat_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $resultat=$res->fetch();
        if($resultat){
            $theResultat = new Resultat($resultat['resultat_id'], $resultat['resultat_title'], $resultat['resultat_description'], $resultat['resultat_date'], $resultat['resultat_imagePrincipale'], $resultat['resultat_categorie'], $resultat['resultat_annee']);
        }
        $this->Deconnexion();
        return $theResultat;
    }

    public function Ajouter($resultat){
        $this->Connexion();
        $req="insert into resultats (resultat_title, resultat_description, resultat_date, resultat_imagePrincipale, resultat_categorie, resultat_annee) values (:title, :desc, :date, :image, :categ, :annee)";
        $stmt=$this->GetDb()->prepare($req);
        $title = $resultat->getResultatTitle();
        $desc = $resultat->getResultatDescription();
        $date = $resultat->getResultatDate();
        $image = $resultat->getResultatImagePrincipale();
        $categ = $resultat->getResultatCategorie();
        $annee = $resultat->getResultatAnnee();
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':categ', $categ);
        $stmt->bindParam('annee', $annee);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Modifier($resultat){
        $this->Connexion();
        $req="update resultats set resultat_title=:title, resultat_description=:desc, resultat_date=:date, resultat_categorie=:categ, resultat_annee=:annee  where resultat_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $id = $resultat->getResultatId();
        $title = $resultat->getResultatTitle();
        $desc = $resultat->getResultatDescription();
        $date = $resultat->getResultatDate();
        $categ = $resultat->getResultatCategorie();
        $annee = $resultat->getResultatAnnee();
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':categ', $categ);
        $stmt->bindParam('annee', $annee);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from resultats where resultat_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function GetImagePrincipale($id){
        $id_image=null;
        $this->Connexion();
        $req="select resultat_imagePrincipale from resultats where resultat_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $image=$stmt->fetch();
        if($image){
            $id_image = $image['resultat_imagePrincipale'];
        }
        return $id_image;
    }

    public function UpdateImagePrincipale($id, $id_resultat){
        $this->Connexion();
        $req="update resultats set resultat_imagePrincipale=:img where resultat_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('img', $id);
        $stmt->bindParam('id', $id_resultat);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function GetAnnees(){
        $listeAnnee=array();
        $this->Connexion();
        $req="select resultat_annee from resultats order by resultat_annee desc"; // Le tri : du plus récent au plus ancien
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $resultat){
            if(!in_array($resultat['resultat_annee'], $listeAnnee)){
                $listeAnnee[] = $resultat['resultat_annee'];
            }
        }
        $this->Deconnexion();
        return $listeAnnee;
    }

    public function GetResultatsByCategorie($id){
        $listeResultat=array();
        $this->Connexion();
        $req="select * from resultats where resultat_categorie=:id order by resultat_date desc";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam('id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $resultat){
            $theResultat = new Resultat($resultat['resultat_id'], $resultat['resultat_title'], $resultat['resultat_description'], $resultat['resultat_date'], $resultat['resultat_imagePrincipale'], $resultat['resultat_categorie'], $resultat['resultat_annee']);
            $listeResultat[] = $theResultat;
        }
        $this->Deconnexion();
        return $listeResultat;
    }

    public function Recherche($categ, $annee){
        $listeResultat=array();
        $pasderecherche=false;
        $this->Connexion();
        if(!is_null($categ)){
            if(!is_null($annee)){
                foreach ($categ as $id){
                    $req="select * from resultats where resultat_categorie=:categ and resultat_annee=:annee";
                    $stmt=$this->GetDb()->prepare($req);
                    $stmt->bindParam(':categ', $id);
                    $stmt->bindParam(':annee', $annee);
                    $stmt->execute();
                    $resultats=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($resultats as $resultat){
                        $theResultat = new Resultat($resultat['resultat_id'], $resultat['resultat_title'], $resultat['resultat_description'], $resultat['resultat_date'], $resultat['resultat_imagePrincipale'], $resultat['resultat_categorie'], $resultat['resultat_annee']);
                        $listeResultat[] = $theResultat;
                    }
                }
            }
            else{
                foreach ($categ as $id){
                    $req="SELECT * FROM resultats WHERE resultat_categorie=:categ";
                    $stmt=$this->GetDb()->prepare($req);
                    $stmt->bindParam(':categ', $id);
                    $stmt->execute();
                    $resultats=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($resultats as $resultat){
                        $theResultat = new Resultat($resultat['resultat_id'], $resultat['resultat_title'], $resultat['resultat_description'], $resultat['resultat_date'], $resultat['resultat_imagePrincipale'], $resultat['resultat_categorie'], $resultat['resultat_annee']);
                        $listeResultat[] = $theResultat;
                    }
                }
            }
        }
        else {
            if (!is_null($annee)) {
                $req="select * from resultats where resultat_annee=:annee";
                $stmt=$this->GetDb()->prepare($req);
                $stmt->bindParam(':annee', $annee);
                $stmt->execute();
                $resultats=$stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($resultats as $resultat){
                    $theResultat = new Resultat($resultat['resultat_id'], $resultat['resultat_title'], $resultat['resultat_description'], $resultat['resultat_date'], $resultat['resultat_imagePrincipale'], $resultat['resultat_categorie'], $resultat['resultat_annee']);
                    $listeResultat[] = $theResultat;
                }
            } else {
                $pasderecherche = true;
            }
        }
        if($pasderecherche){
            $listeResultat=null;
        }
        $this->Deconnexion();
        return $listeResultat;
    }
}