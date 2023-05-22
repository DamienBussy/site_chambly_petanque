<?php

namespace Models;
use Comment;
use DateTime;
use PDO;
require_once "Entities/Comment.php";
require_once "DatabaseModel.php";
class CommentModel extends DatabaseModel
{
    public function GetComments($annonce_id){
        $listeComments=array();
        $this->Connexion();
        $req="select * from comments where comment_annonce=:id order by comment_date";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam('id', $annonce_id);
        $res->execute();
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $comment){
            $theComment = new Comment($comment['comment_id'], $comment['comment_text'], $comment['comment_date'], $comment['comment_update'], $comment['comment_joueur'], $comment['comment_annonce']);
            $listeComments[] = $theComment;
        }
        $this->Deconnexion();
        return $listeComments;
    }

    public function GetComment($id){
        $theComment=null;
        $this->Connexion();
        $req="select * from comments where comment_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $comment=$res->fetch();
        if($comment){
            $theComment = new Comment($comment['comment_id'], $comment['comment_text'], $comment['comment_date'], $comment['comment_update'], $comment['comment_joueur'], $comment['comment_annonce']);
        }
        $this->Deconnexion();
        return $theComment;
    }

    public function Create($comment){
        $this->Connexion();
        $req="insert into comments (comment_text, comment_date, comment_update, comment_joueur, comment_annonce) values (:text, :date, :update, :joueur, :annonce)";
        $stmt = $this->GetDb()->prepare($req);
        $text=$comment->getCommentText();
        $stmt->bindParam(':text', $text);
        $date=$comment->getCommentDate();
        $annonce_date = $date->format('Y-m-d H:i:s');
        $stmt->bindParam(':date', $annonce_date);
        $faux=false;
        $stmt->bindParam(':update', $faux);
        $joueur=$comment->getCommentJoueur();
        $stmt->bindParam(':joueur', $joueur);
        $annonce=$comment->getCommentAnnonce();
        $stmt->bindParam(':annonce', $annonce);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Modifier($comment){
        $this->Connexion();
        $req="update comments set comment_text=:text where comment_id=:id";
        $stmt = $this->GetDb()->prepare($req);
        $text=$comment->getCommentText();
        $stmt->bindParam(':text', $text);
        $comment_id=$comment->getCommentId();
        $stmt->bindParam(':id', $comment_id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from comments where comment_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

}