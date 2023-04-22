<?php

class Event
{
    private $event_id;
    private $event_title;
    private $event_description;
    private $event_date;
    private $event_lieu;
    private $event_heureDebut;
    private $event_heureFin;
    private $event_imagePrincipale;
    private $event_categorie;

    private $pathImagePrincipale; // Comme on ne stocke que l'id de l'image principale dans la bdd, on créer un nouvel attribut pour le stocker (ce champs ne sera pas forcément remplie a chaque fois)

    public function __construct($id, $title, $desc, $date, $lieu, $heureD, $heureF, $image, $categ){
        $this->event_id=$id;
        $this->event_title=$title;
        $this->event_description=$desc;
        $this->event_date=$date;
        $this->event_lieu=$lieu;
        $this->event_heureDebut=$heureD;
        $this->event_heureFin=$heureF;
        $this->event_imagePrincipale=$image;
        $this->event_categorie=$categ;
    }

    public function setPathImagePrincipale($path){
        $this->pathImagePrincipale=$path;
    }
    public function getPathImagePrincipale(){
        return $this->pathImagePrincipale;
    }

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * @param mixed $event_id
     */
    public function setEventId($event_id)
    {
        $this->event_id = $event_id;
    }

    /**
     * @return mixed
     */
    public function getEventTitle()
    {
        return $this->event_title;
    }

    /**
     * @param mixed $event_title
     */
    public function setEventTitle($event_title)
    {
        $this->event_title = $event_title;
    }

    /**
     * @return mixed
     */
    public function getEventDescription()
    {
        return $this->event_description;
    }

    /**
     * @param mixed $event_description
     */
    public function setEventDescription($event_description)
    {
        $this->event_description = $event_description;
    }

    /**
     * @return mixed
     */
    public function getEventDate()
    {
        return $this->event_date;
    }

    /**
     * @param mixed $event_date
     */
    public function setEventDate($event_date)
    {
        $this->event_date = $event_date;
    }

    /**
     * @return mixed
     */
    public function getEventLieu()
    {
        return $this->event_lieu;
    }

    /**
     * @param mixed $event_lieu
     */
    public function setEventLieu($event_lieu)
    {
        $this->event_lieu = $event_lieu;
    }

    /**
     * @return mixed
     */
    public function getEventHeureDebut()
    {
        return $this->event_heureDebut;
    }

    /**
     * @param mixed $event_heureDebut
     */
    public function setEventHeureDebut($event_heureDebut)
    {
        $this->event_heureDebut = $event_heureDebut;
    }

    /**
     * @return mixed
     */
    public function getEventHeureFin()
    {
        return $this->event_heureFin;
    }

    /**
     * @param mixed $event_heureFin
     */
    public function setEventHeureFin($event_heureFin)
    {
        $this->event_heureFin = $event_heureFin;
    }

    /**
     * @return mixed
     */
    public function getEventImagePrincipale()
    {
        return $this->event_imagePrincipale;
    }

    /**
     * @param mixed $event_imagePrincipale
     */
    public function setEventImagePrincipale($event_imagePrincipale)
    {
        $this->event_imagePrincipale = $event_imagePrincipale;
    }

    /**
     * @return mixed
     */
    public function getEventCategorie()
    {
        return $this->event_categorie;
    }

    /**
     * @param mixed $event_categorie
     */
    public function setEventCategorie($event_categorie)
    {
        $this->event_categorie = $event_categorie;
    }


}