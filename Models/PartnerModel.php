<?php

namespace Models;

use PDO;
use Partner;
require_once "Entities/Partner.php";
require_once "DatabaseModel.php";

class PartnerModel extends DatabaseModel
{
    public function GetPartners(){
        $listeParners=array();
        $this->Connexion();
        $req="select * from partners";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->execute();
        $line=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $partner){
            $thePartner = new Partner($partner['partner_id'], $partner['partner_titre'], $partner['partner_link'], $partner['partner_picture']);
            $listeParners[] = $thePartner;
        }
        $this->Deconnexion();
        return $listeParners;
    }

    public function GetPartner($id){
        $this->Connexion();
        $req="select * from partners where partner_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $line=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $partner){
            $thePartner = new Partner($partner['partner_id'], $partner['partner_titre'], $partner['partner_link'], $partner['partner_picture']);
        }
        $this->Deconnexion();
        return $thePartner;
    }


    public function Ajouter($partner){
        $this->Connexion();
        $req="insert into partners (partner_titre, partner_link, partner_picture) values (:title, :link, :picture)";
        $stmt=$this->GetDb()->prepare($req);
        $title = $partner->getPartnerTitre();
        $link = $partner->getPartnerLink();
        $picture = $partner->getPartnerPicture();
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':picture', $picture);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Modifier($partner){
        $this->Connexion();
        $req="update partners set partner_titre=:title, partner_link=:link where partner_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $id=$partner->getPartnerId();
        $title = $partner->getPartnerTitre();
        $link = $partner->getPartnerLink();
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from partners where partner_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }


}