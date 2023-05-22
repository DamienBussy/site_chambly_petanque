<?php

class Joueur
{
    private $joueur_id;
    private $joueur_nom;
    private $joueur_prenom;
    private $joueur_login;
    private $joueur_photo;

    /**
     * @param $joueur_nom
     * @param $joueur_prenom
     * @param $joueur_login
     */
    public function __construct($joueur_id, $joueur_nom, $joueur_prenom, $joueur_login, $joueur_photo)
    {
        $this->joueur_id = $joueur_id;
        $this->joueur_nom = $joueur_nom;
        $this->joueur_prenom = $joueur_prenom;
        $this->joueur_login = $joueur_login;
        $this->joueur_photo = $joueur_photo;
    }

    /**
     * @return mixed
     */
    public function getJoueurId()
    {
        return $this->joueur_id;
    }

    /**
     * @param mixed $joueur_id
     */
    public function setJoueurId($joueur_id)
    {
        $this->joueur_id = $joueur_id;
    }

    /**
     * @return mixed
     */
    public function getJoueurPhoto()
    {
        return $this->joueur_photo;
    }

    /**
     * @param mixed $joueur_photo
     */
    public function setJoueurPhoto($joueur_photo)
    {
        $this->joueur_photo = $joueur_photo;
    }

    /**
     * @return mixed
     */
    public function getJoueurNom()
    {
        return $this->joueur_nom;
    }

    /**
     * @param mixed $joueur_nom
     */
    public function setJoueurNom($joueur_nom)
    {
        $this->joueur_nom = $joueur_nom;
    }

    /**
     * @return mixed
     */
    public function getJoueurPrenom()
    {
        return $this->joueur_prenom;
    }

    /**
     * @param mixed $joueur_prenom
     */
    public function setJoueurPrenom($joueur_prenom)
    {
        $this->joueur_prenom = $joueur_prenom;
    }

    /**
     * @return mixed
     */
    public function getJoueurLogin()
    {
        return $this->joueur_login;
    }

    /**
     * @param mixed $joueur_login
     */
    public function setJoueurLogin($joueur_login)
    {
        $this->joueur_login = $joueur_login;
    }


}