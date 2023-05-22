<?php

namespace Models;

use ExceptionConnexion;
use PDO;
use Event;
require_once "Entities/Event.php";
require_once "DatabaseModel.php";
class EventModel extends DatabaseModel
{
    public function GetEvents(){
        $listeEvents=array();
        $this->Connexion();
        $req="select * from events order by event_date desc"; // Le tri : du plus récent au plus ancien
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $event){
            $theEvent = new Event($event['event_id'], $event['event_title'], $event['event_description'], $event['event_date'], $event['event_lieu'], $event['event_heureDebut'], $event['event_heureFin'], $event['event_imagePrincipale'], $event['event_categorie']);
            $listeEvents[] = $theEvent;
        }
        $this->Deconnexion();
        return $listeEvents;
    }

    public function GetEvent($id){
        $theEvent=null;
        $this->Connexion();
        $req="select * from events where event_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $event=$res->fetch();
        if($event){
            $theEvent = new Event($event['event_id'], $event['event_title'], $event['event_description'], $event['event_date'], $event['event_lieu'], $event['event_heureDebut'], $event['event_heureFin'], $event['event_imagePrincipale'], $event['event_categorie']);
        }
        $this->Deconnexion();
        return $theEvent;
    }

    public function Ajouter($event){
        $this->Connexion();
        $req="insert into events (event_title, event_description, event_date, event_lieu, event_heureDebut, event_heureFin, event_imagePrincipale, event_categorie) values (:title, :desc, :date, :lieu, :heureD, :heureF, :image, :categ)";
        $stmt=$this->GetDb()->prepare($req);
        $title = $event->getEventTitle();
        $desc = $event->getEventDescription();
        $date = $event->getEventDate();
        $lieu = $event->getEventLieu();
        $heureD = $event->getEventHeureDebut();
        $heureF = $event->getEventHeureFin();
        $image = $event->getEventImagePrincipale();
        $categ = $event->getEventCategorie();
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':lieu', $lieu);
        $stmt->bindParam(':heureD', $heureD);
        $stmt->bindParam(':heureF', $heureF);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':categ', $categ);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Modifier($event){
        $this->Connexion();
        $req="update events set event_title=:title, event_description=:desc, event_date=:date, event_lieu=:lieu, event_heureDebut=:heureD, event_heureFin=:heureF, event_imagePrincipale=:image, event_categorie=:categ  where event_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $id = $event->getEventId();
        $title = $event->getEventTitle();
        $desc = $event->getEventDescription();
        $date = $event->getEventDate();
        $lieu = $event->getEventLieu();
        $heureD = $event->getEventHeureDebut();
        $heureF = $event->getEventHeureFin();
        $image = $event->getEventImagePrincipale();
        $categ = $event->getEventCategorie();
        $stmt->bindParam('id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':lieu', $lieu);
        $stmt->bindParam(':heureD', $heureD);
        $stmt->bindParam(':heureF', $heureF);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':categ', $categ);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from events where event_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function GetImagePrincipale($id){
        $id_image=null;
        $this->Connexion();
        $req="select event_imagePrincipale from events where event_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $image=$stmt->fetch();
        if($image){
            $id_image = $image['event_imagePrincipale'];
        }
        return $id_image;
    }

    public function UpdateImagePrincipale($id, $id_event){
        $this->Connexion();
        $req="update events set event_imagePrincipale=:img where event_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('img', $id);
        $stmt->bindParam('id', $id_event);
        $stmt->execute();
        $this->Deconnexion();
    }

    // Recherche d'un evenement A VENIR pour une catégorie
    public function GetEventFuturByCategorie($id){
        $listeEvents=array();
        $this->Connexion();
        $req="select * from events where event_categorie=:id and event_date > NOW()";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $line=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $event){
            $theEvent = new Event($event['event_id'], $event['event_title'], $event['event_description'], $event['event_date'], $event['event_lieu'], $event['event_heureDebut'], $event['event_heureFin'], $event['event_imagePrincipale'], $event['event_categorie']);
            $listeEvents[] = $theEvent;
        }
        $this->Deconnexion();
        return $listeEvents;
    }
}