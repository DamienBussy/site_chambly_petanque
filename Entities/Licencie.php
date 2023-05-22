<?php

class Licencie
{
    private $licencie_id;
    private $licencie_nom;
    private $licencie_prenom;
    private $licencie_statut;
    private $licencie_categorie;
    private $licencie_classe;
    private $licencie_photo;

    /**
     * @param $licencie_id
     * @param $licencie_nom
     * @param $licencie_prenom
     * @param $licencie_statut
     * @param $licencie_categorie
     * @param $licencie_classe
     * @param $licencie_photo
     */
    public function __construct($licencie_id, $licencie_nom, $licencie_prenom, $licencie_statut, $licencie_categorie, $licencie_classe, $licencie_photo)
    {
        $this->licencie_id = $licencie_id;
        $this->licencie_nom = $licencie_nom;
        $this->licencie_prenom = $licencie_prenom;
        $this->licencie_statut = $licencie_statut;
        $this->licencie_categorie = $licencie_categorie;
        $this->licencie_classe = $licencie_classe;
        $this->licencie_photo = $licencie_photo;
    }

    /**
     * @return mixed
     */
    public function getLicencieId()
    {
        return $this->licencie_id;
    }

    /**
     * @param mixed $licencie_id
     */
    public function setLicencieId($licencie_id)
    {
        $this->licencie_id = $licencie_id;
    }

    /**
     * @return mixed
     */
    public function getLicencieNom()
    {
        return $this->licencie_nom;
    }

    /**
     * @param mixed $licencie_nom
     */
    public function setLicencieNom($licencie_nom)
    {
        $this->licencie_nom = $licencie_nom;
    }

    /**
     * @return mixed
     */
    public function getLicenciePrenom()
    {
        return $this->licencie_prenom;
    }

    /**
     * @param mixed $licencie_prenom
     */
    public function setLicenciePrenom($licencie_prenom)
    {
        $this->licencie_prenom = $licencie_prenom;
    }

    /**
     * @return mixed
     */
    public function getLicencieStatut()
    {
        return $this->licencie_statut;
    }

    /**
     * @param mixed $licencie_statut
     */
    public function setLicencieStatut($licencie_statut)
    {
        $this->licencie_statut = $licencie_statut;
    }

    /**
     * @return mixed
     */
    public function getLicencieCategorie()
    {
        return $this->licencie_categorie;
    }

    /**
     * @param mixed $licencie_categorie
     */
    public function setLicencieCategorie($licencie_categorie)
    {
        $this->licencie_categorie = $licencie_categorie;
    }

    /**
     * @return mixed
     */
    public function getLicencieClasse()
    {
        return $this->licencie_classe;
    }

    /**
     * @param mixed $licencie_classe
     */
    public function setLicencieClasse($licencie_classe)
    {
        $this->licencie_classe = $licencie_classe;
    }

    /**
     * @return mixed
     */
    public function getLicenciePhoto()
    {
        return $this->licencie_photo;
    }

    /**
     * @param mixed $licencie_photo
     */
    public function setLicenciePhoto($licencie_photo)
    {
        $this->licencie_photo = $licencie_photo;
    }


}