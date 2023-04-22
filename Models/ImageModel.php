<?php

namespace Models;

use PDO;
use Image;
require_once "Entities/Image.php";
require_once "DatabaseModel.php";

class ImageModel extends DatabaseModel
{
    public function getImagePrincipaleEvent($id){
        $theImage=null;
        $this->Connexion();
        $req="select * from images where image_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $image=$stmt->fetch();

        if($image){
            $theImage = new Image($image['image_id'], $image['image_path'], $image['event_id']);
        }
        $this->Deconnexion();
        return $theImage;
    }
    public function getIdImagePrincipaleEventByEventId($id){
        $theImage=null;
        $this->Connexion();
        $req="select event_imagePrincipale from events where event_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $image=$stmt->fetch();

        if($image){
            $theImage = $image['event_imagePrincipale'];
        }
        $this->Deconnexion();
        return $theImage;
    }


    public function getImagesByEvent($id){
        $listeImages=array();
        $this->Connexion();
        $req="select * from images where event_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $image=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($image as $img){
            $theImage = new Image($img['image_id'], $img['image_path'], $img['event_id']);
            $listeImages[] = $theImage;
        }
        $this->Deconnexion();
        return $listeImages;
    }

    public function Ajouter($path, $event){
        $this->Connexion();
        $req="insert into images (image_path, event_id) values (:path, :event)";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('path', $path);
        $stmt->bindParam('event', $event);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from images where image_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}