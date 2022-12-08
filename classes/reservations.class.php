<?php

class Reserve {
    // Properties
    private $id;
    private $date_reserve;
    private $id_user;
    private $id_voyage;

    // method
    public function __construct($id, $date_reserve, $id_user, $id_voyage)
    {
        $this->id           = $id;
        $this->date_reserve = $date_reserve;
        $this->id_user      = $id_user;
        $this->id_voyage    = $id_voyage;
    }

    //setters
    public function setIdReserve($id_reserve)
    {
        $this->id = $id_reserve;
    }

    public function setDateReserve($date_reserve)
    {
        $this->date_reserve = $date_reserve;
    }

    public function setIduserReserve($id_user_reserve)
    {
        $this->id_user = $id_user_reserve;
    }
    
    public function setIdvoyageReserve($id_voyage_reserve)
    {
        $this->id_voyage = $id_voyage_reserve;
    }
    
    //gettters
    public function getIdReserve()
    {
        return $this->id;
    }
    
    public function getDateReserve()
    {
        return $this->date_reserve;
    }
    
    public function getIduserReserve()
    {
        return $this->id_user;
    }
    
    public function getIdvoyageReserve()
    {
        return $this->id_voyage;
    }
}   