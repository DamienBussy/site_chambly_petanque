<?php

class Image
{
    private $image_id;
    private $image_path;
    private $event_id;
    private $resultat_id;

    public function __construct($id, $path, $eventID, $resultatID){
        $this->image_id=$id;
        $this->image_path=$path;
        $this->event_id=$eventID;
        $this->resultat_id=$resultatID;
    }

    /**
     * @return mixed
     */
    public function getImageId()
    {
        return $this->image_id;
    }

    /**
     * @param mixed $image_id
     */
    public function setImageId($image_id)
    {
        $this->image_id = $image_id;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return "resources/pictures/".$this->image_path;
    }

    /**
     * @param mixed $image_path
     */
    public function setImagePath($image_path)
    {
        $this->image_path = $image_path;
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


}