<?php

namespace Controllers\Admin;

use Comment;
use DateTime;
use Models\CommentModel;
use Models\JoueurModel;

require_once "Models/CommentModel.php";
require_once "Models/JoueurModel.php";
require_once "Entities/Comment.php";
class CommentController
{
    private $data;
    private $comment_model;

    public function __construct(){
        $this->data=array();
        $this->comment_model=new CommentModel();
        $this->joueur_model=new JoueurModel();
    }

    public function AfficherCommentsOfAnnonce($idAnnonce, $titreAnnonce){
        $comments=$this->comment_model->GetComments($idAnnonce);
        foreach ($comments as $com){
            $joueur = $this->joueur_model->GetJoueur($com->getCommentJoueur());
            $concatenation = $joueur->getJoueurPrenom() ." ". $joueur->getJoueurNom();
            $com->setJoueurPrenomNom($concatenation);
            $com->setJoueurPhoto($joueur->getJoueurPhoto());
        }
        $this->data['idAnnonce']=$idAnnonce;
        $this->data['titre']=$titreAnnonce;
        $this->data['lesComments']=$comments;

        require_once "Views/public/joueurs/commentsAnnonce.php";
    }

    public function PublierComment($cMessage, $idAnnonce, $idJoueur, $titreAnnonce){
        $date=new DateTime();
        $comment=new Comment(0, $cMessage, $date, false, $idJoueur, $idAnnonce);
        $this->comment_model->Create($comment);

        $this->AfficherCommentsOfAnnonce($idAnnonce,$titreAnnonce);
    }
}