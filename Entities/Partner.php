<?php

class Partner
{
    private $partner_id;
    private $partner_titre;
    private $partner_link;
    private $partner_picture;

    /**
     * @param $partner_id
     * @param $partner_titre
     * @param $partner_link
     * @param $partner_picture
     */
    public function __construct($partner_id, $partner_titre, $partner_link, $partner_picture)
    {
        $this->partner_id = $partner_id;
        $this->partner_titre = $partner_titre;
        $this->partner_link = $partner_link;
        $this->partner_picture = $partner_picture;
    }

    /**
     * @return mixed
     */
    public function getPartnerId()
    {
        return $this->partner_id;
    }

    /**
     * @param mixed $partner_id
     */
    public function setPartnerId($partner_id)
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return mixed
     */
    public function getPartnerTitre()
    {
        return $this->partner_titre;
    }

    /**
     * @param mixed $partner_titre
     */
    public function setPartnerTitre($partner_titre)
    {
        $this->partner_titre = $partner_titre;
    }

    /**
     * @return mixed
     */
    public function getPartnerLink()
    {
        return $this->partner_link;
    }

    /**
     * @param mixed $partner_link
     */
    public function setPartnerLink($partner_link)
    {
        $this->partner_link = $partner_link;
    }

    /**
     * @return mixed
     */
    public function getPartnerPicture()
    {
        return $this->partner_picture;
    }

    /**
     * @param mixed $partner_picture
     */
    public function setPartnerPicture($partner_picture)
    {
        $this->partner_picture = $partner_picture;
    }


}