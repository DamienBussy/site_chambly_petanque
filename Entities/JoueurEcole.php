<?php

class JoueurEcole
{
    private $joueurecole_id;
    private $joueurecole_nom;
    private $joueurecole_prenom;
    private $joueurecole_photo;

    /**
     * @param $joueurecole_id
     * @param $joueurecole_nom
     * @param $joueurecole_prenom
     * @param $joueurecole_photo
     */
    public function __construct($joueurecole_id, $joueurecole_nom, $joueurecole_prenom, $joueurecole_photo)
    {
        $this->joueurecole_id = $joueurecole_id;
        $this->joueurecole_nom = $joueurecole_nom;
        $this->joueurecole_prenom = $joueurecole_prenom;
        $this->joueurecole_photo = $joueurecole_photo;
    }

    /**
     * @return mixed
     */
    public function getJoueurecoleId()
    {
        return $this->joueurecole_id;
    }

    /**
     * @param mixed $joueurecole_id
     */
    public function setJoueurecoleId($joueurecole_id)
    {
        $this->joueurecole_id = $joueurecole_id;
    }

    /**
     * @return mixed
     */
    public function getJoueurecoleNom()
    {
        return $this->joueurecole_nom;
    }

    /**
     * @param mixed $joueurecole_nom
     */
    public function setJoueurecoleNom($joueurecole_nom)
    {
        $this->joueurecole_nom = $joueurecole_nom;
    }

    /**
     * @return mixed
     */
    public function getJoueurecolePrenom()
    {
        return $this->joueurecole_prenom;
    }

    /**
     * @param mixed $joueurecole_prenom
     */
    public function setJoueurecolePrenom($joueurecole_prenom)
    {
        $this->joueurecole_prenom = $joueurecole_prenom;
    }

    /**
     * @return mixed
     */
    public function getJoueurecolePhoto()
    {
        return $this->joueurecole_photo;
    }

    /**
     * @param mixed $joueurecole_photo
     */
    public function setJoueurecolePhoto($joueurecole_photo)
    {
        $this->joueurecole_photo = $joueurecole_photo;
    }


}