<?php

class User
{
    private $user_id;
    private $user_lastname;
    private $user_firstname;
    private $user_login;
    private $user_email;
    private $user_statut;

    public function __construct($id, $lastname, $firstname, $email, $login, $statut){
        $this->user_id=$id;
        $this->user_lastname=$lastname;
        $this->user_firstname=$firstname;
        $this->user_login=$login;
        $this->user_email=$email;
        $this->user_statut=$statut;
    }

    /**
     * @return mixed
     */
    public function getUserLogin()
    {
        return $this->user_login;
    }

    /**
     * @param mixed $user_login
     */
    public function setUserLogin($user_login)
    {
        $this->user_login = $user_login;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserLastname()
    {
        return $this->user_lastname;
    }

    /**
     * @param mixed $user_lastname
     */
    public function setUserLastname($user_lastname)
    {
        $this->user_lastname = $user_lastname;
    }

    /**
     * @return mixed
     */
    public function getUserFirstname()
    {
        return $this->user_firstname;
    }

    /**
     * @param mixed $user_firstname
     */
    public function setUserFirstname($user_firstname)
    {
        $this->user_firstname = $user_firstname;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * @param mixed $user_email
     */
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    /**
     * @return mixed
     */
    public function getUserStatut()
    {
        return $this->user_statut;
    }

    /**
     * @param mixed $user_statut
     */
    public function setUserStatut($user_statut)
    {
        $this->user_statut = $user_statut;
    }


}