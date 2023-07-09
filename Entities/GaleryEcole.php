<?php

class GaleryEcole
{
    private $galeryecole_id;
    private $galeryecole_path;
    private $galeryecole_ecole;

    /**
     * @param $galeryecole_id
     * @param $galeryecole_path
     * @param $galeryecole_ecole
     */
    public function __construct($galeryecole_id, $galeryecole_path, $galeryecole_ecole)
    {
        $this->galeryecole_id = $galeryecole_id;
        $this->galeryecole_path = $galeryecole_path;
        $this->galeryecole_ecole = $galeryecole_ecole;
    }

    /**
     * @return mixed
     */
    public function getGaleryecoleId()
    {
        return $this->galeryecole_id;
    }

    /**
     * @param mixed $galeryecole_id
     */
    public function setGaleryecoleId($galeryecole_id)
    {
        $this->galeryecole_id = $galeryecole_id;
    }

    /**
     * @return mixed
     */
    public function getGaleryecolePath()
    {
        return $this->galeryecole_path;
    }

    /**
     * @param mixed $galeryecole_path
     */
    public function setGaleryecolePath($galeryecole_path)
    {
        $this->galeryecole_path = $galeryecole_path;
    }

    /**
     * @return mixed
     */
    public function getGaleryecoleEcole()
    {
        return $this->galeryecole_ecole;
    }

    /**
     * @param mixed $galeryecole_ecole
     */
    public function setGaleryecoleEcole($galeryecole_ecole)
    {
        $this->galeryecole_ecole = $galeryecole_ecole;
    }


}