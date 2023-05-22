<?php

class Resultat
{
    private $resultat_id;
    private $resultat_title;
    private $resultat_description;
    private $resultat_date;
    private $resultat_imagePrincipale;
    private $resultat_categorie;
    private $resultat_annee;

    private $pathImagePrincipale;

    /**
     * @param $resultat_id
     * @param $resultat_title
     * @param $resultat_description
     * @param $resultat_date
     * @param $resultat_imagePrincipale
     * @param $resultat_categorie
     * @param $resultat_annee
     */
    public function __construct($resultat_id, $resultat_title, $resultat_description, $resultat_date, $resultat_imagePrincipale, $resultat_categorie, $resultat_annee)
    {
        $this->resultat_id = $resultat_id;
        $this->resultat_title = $resultat_title;
        $this->resultat_description = $resultat_description;
        $this->resultat_date = $resultat_date;
        $this->resultat_imagePrincipale = $resultat_imagePrincipale;
        $this->resultat_categorie = $resultat_categorie;
        $this->resultat_annee = $resultat_annee;
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
    public function getResultatId()
    {
        return $this->resultat_id;
    }

    /**
     * @param mixed $resultat_id
     */
    public function setResultatId($resultat_id)
    {
        $this->resultat_id = $resultat_id;
    }

    /**
     * @return mixed
     */
    public function getResultatTitle()
    {
        return $this->resultat_title;
    }

    /**
     * @param mixed $resultat_title
     */
    public function setResultatTitle($resultat_title)
    {
        $this->resultat_title = $resultat_title;
    }

    /**
     * @return mixed
     */
    public function getResultatDescription()
    {
        return $this->resultat_description;
    }

    /**
     * @param mixed $resultat_description
     */
    public function setResultatDescription($resultat_description)
    {
        $this->resultat_description = $resultat_description;
    }

    /**
     * @return mixed
     */
    public function getResultatDate()
    {
        return $this->resultat_date;
    }

    /**
     * @param mixed $resultat_date
     */
    public function setResultatDate($resultat_date)
    {
        $this->resultat_date = $resultat_date;
    }

    /**
     * @return mixed
     */
    public function getResultatImagePrincipale()
    {
        return $this->resultat_imagePrincipale;
    }

    /**
     * @param mixed $resultat_imagePrincipale
     */
    public function setResultatImagePrincipale($resultat_imagePrincipale)
    {
        $this->resultat_imagePrincipale = $resultat_imagePrincipale;
    }

    /**
     * @return mixed
     */
    public function getResultatCategorie()
    {
        return $this->resultat_categorie;
    }

    /**
     * @param mixed $resultat_categorie
     */
    public function setResultatCategorie($resultat_categorie)
    {
        $this->resultat_categorie = $resultat_categorie;
    }

    /**
     * @return mixed
     */
    public function getResultatAnnee()
    {
        return $this->resultat_annee;
    }

    /**
     * @param mixed $resultat_annee
     */
    public function setResultatAnnee($resultat_annee)
    {
        $this->resultat_annee = $resultat_annee;
    }


}