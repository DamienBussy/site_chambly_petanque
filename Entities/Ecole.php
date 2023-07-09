<?php

class Ecole
{
    private $ecole_id;
    private $ecole_titre;
    private $ecole_description;
    private $ecole_date;

    /**
     * @param $ecole_id
     * @param $ecole_titre
     * @param $ecole_description
     * @param $ecole_date
     * @param $ecole_photos
     */
    public function __construct($ecole_id, $ecole_titre, $ecole_description, $ecole_date)
    {
        $this->ecole_id = $ecole_id;
        $this->ecole_titre = $ecole_titre;
        $this->ecole_description = $ecole_description;
        $this->ecole_date = $ecole_date;
    }

    /**
     * @return mixed
     */
    public function getEcoleId()
    {
        return $this->ecole_id;
    }

    /**
     * @param mixed $ecole_id
     */
    public function setEcoleId($ecole_id)
    {
        $this->ecole_id = $ecole_id;
    }

    /**
     * @return mixed
     */
    public function getEcoleTitre()
    {
        return $this->ecole_titre;
    }

    /**
     * @param mixed $ecole_titre
     */
    public function setEcoleTitre($ecole_titre)
    {
        $this->ecole_titre = $ecole_titre;
    }

    /**
     * @return mixed
     */
    public function getEcoleDescription()
    {
        return $this->ecole_description;
    }

    /**
     * @param mixed $ecole_description
     */
    public function setEcoleDescription($ecole_description)
    {
        $this->ecole_description = $ecole_description;
    }

    /**
     * @return mixed
     */
    public function getEcoleDate()
    {
        return $this->ecole_date;
    }

    /**
     * @param mixed $ecole_date
     */
    public function setEcoleDate($ecole_date)
    {
        $this->ecole_date = $ecole_date;
    }


}