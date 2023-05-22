<?php

class Annonce
{

    private $annonce_id;
    private $annonce_titre;
    private $annonce_date;
    private $annonce_joueur;
    private $joueur;

    /**
     * @param $annonce_id
     * @param $annonce_titre
     * @param $annonce_date
     * @param $annonce_joueur
     */
    public function __construct($annonce_id, $annonce_titre, $annonce_date, $annonce_joueur)
    {
        $this->annonce_id = $annonce_id;
        $this->annonce_titre = $annonce_titre;
        $this->annonce_date = $annonce_date;
        $this->annonce_joueur = $annonce_joueur;
    }

    public function getJoueur(){
        return $this->joueur;
    }
    public function setJoueur($param){
        $this->joueur=$param;
    }
    /**
     * @return mixed
     */
    public function getAnnonceId()
    {
        return $this->annonce_id;
    }

    /**
     * @param mixed $annonce_id
     */
    public function setAnnonceId($annonce_id)
    {
        $this->annonce_id = $annonce_id;
    }

    /**
     * @return mixed
     */
    public function getAnnonceTitre()
    {
        return $this->annonce_titre;
    }

    /**
     * @param mixed $annonce_titre
     */
    public function setAnnonceTitre($annonce_titre)
    {
        $this->annonce_titre = $annonce_titre;
    }

    /**
     * @return mixed
     */
    public function getAnnonceDate()
    {
        return $this->annonce_date;
    }

    /**
     * @param mixed $annonce_date
     */
    public function setAnnonceDate($annonce_date)
    {
        $this->annonce_date = $annonce_date;
    }

    /**
     * @return mixed
     */
    public function getAnnonceJoueur()
    {
        return $this->annonce_joueur;
    }

    /**
     * @param mixed $annonce_joueur
     */
    public function setAnnonceJoueur($annonce_joueur)
    {
        $this->annonce_joueur = $annonce_joueur;
    }

}