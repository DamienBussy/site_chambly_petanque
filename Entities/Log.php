<?php

class Log
{
    private $log_id;
    private $log_dateHeure;
    private $log_admin;
    private $log_title;

    /**
     * @param $log_id
     * @param $log_dateHeure
     * @param $log_admin
     * @param $log_title
     */
    public function __construct($log_id, $log_dateHeure, $log_admin, $log_title)
    {
        $this->log_id = $log_id;
        $this->log_dateHeure = $log_dateHeure;
        $this->log_admin = $log_admin;
        $this->log_title = $log_title;
    }

    /**
     * @return mixed
     */
    public function getLogId()
    {
        return $this->log_id;
    }

    /**
     * @param mixed $log_id
     */
    public function setLogId($log_id)
    {
        $this->log_id = $log_id;
    }

    /**
     * @return mixed
     */
    public function getLogDateHeure()
    {
        return $this->log_dateHeure;
    }

    /**
     * @param mixed $log_dateHeure
     */
    public function setLogDateHeure($log_dateHeure)
    {
        $this->log_dateHeure = $log_dateHeure;
    }

    /**
     * @return mixed
     */
    public function getLogAdmin()
    {
        return $this->log_admin;
    }

    /**
     * @param mixed $log_admin
     */
    public function setLogAdmin($log_admin)
    {
        $this->log_admin = $log_admin;
    }

    /**
     * @return mixed
     */
    public function getLogTitle()
    {
        return $this->log_title;
    }

    /**
     * @param mixed $log_title
     */
    public function setLogTitle($log_title)
    {
        $this->log_title = $log_title;
    }


}