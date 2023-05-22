<?php

class Comment
{
    private $comment_id;
    private $comment_text;
    private $comment_date;
    private $comment_update;
    private $comment_joueur;
    private $comment_annonce;

    private $joueurPrenomNom;
    private $joueurPhoto;

    /**
     * @param $comment_id
     * @param $comment_text
     * @param $comment_date
     * @param $comment_update
     * @param $comment_joueur
     * @param $comment_annonce
     */
    public function __construct($comment_id, $comment_text, $comment_date, $comment_update, $comment_joueur, $comment_annonce)
    {
        $this->comment_id = $comment_id;
        $this->comment_text = $comment_text;
        $this->comment_date = $comment_date;
        $this->comment_update = $comment_update;
        $this->comment_joueur = $comment_joueur;
        $this->comment_annonce = $comment_annonce;
    }

    /**
     * @return mixed
     */
    public function getJoueurPrenomNom()
    {
        return $this->joueurPrenomNom;
    }

    /**
     * @param mixed $joueurPrenomNom
     */
    public function setJoueurPrenomNom($joueurPrenomNom)
    {
        $this->joueurPrenomNom = $joueurPrenomNom;
    }

    /**
     * @return mixed
     */
    public function getJoueurPhoto()
    {
        return $this->joueurPhoto;
    }

    /**
     * @param mixed $joueurPhoto
     */
    public function setJoueurPhoto($joueurPhoto)
    {
        $this->joueurPhoto = $joueurPhoto;
    }


    /**
     * @return mixed
     */
    public function getCommentId()
    {
        return $this->comment_id;
    }

    /**
     * @param mixed $comment_id
     */
    public function setCommentId($comment_id)
    {
        $this->comment_id = $comment_id;
    }

    /**
     * @return mixed
     */
    public function getCommentText()
    {
        return $this->comment_text;
    }

    /**
     * @param mixed $comment_text
     */
    public function setCommentText($comment_text)
    {
        $this->comment_text = $comment_text;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->comment_date;
    }

    /**
     * @param mixed $comment_date
     */
    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
    }

    /**
     * @return mixed
     */
    public function getCommentUpdate()
    {
        return $this->comment_update;
    }

    /**
     * @param mixed $comment_update
     */
    public function setCommentUpdate($comment_update)
    {
        $this->comment_update = $comment_update;
    }

    /**
     * @return mixed
     */
    public function getCommentJoueur()
    {
        return $this->comment_joueur;
    }

    /**
     * @param mixed $comment_joueur
     */
    public function setCommentJoueur($comment_joueur)
    {
        $this->comment_joueur = $comment_joueur;
    }

    /**
     * @return mixed
     */
    public function getCommentAnnonce()
    {
        return $this->comment_annonce;
    }

    /**
     * @param mixed $comment_annonce
     */
    public function setCommentAnnonce($comment_annonce)
    {
        $this->comment_annonce = $comment_annonce;
    }

}