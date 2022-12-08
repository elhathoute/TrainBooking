<?php

class Voyages {
    // Properties
    private $id;
    private $date_dep;
    private $date_arr;
    private $cap_voyage;
    private $prix_voyage;
    private $id_train;
    private $id_gare_dep;
    private $id_gare_arr;

    // method
    public function __construct($id, $date_dep, $date_arr, $cap_voyage, $prix_voyage, $id_train, $id_gare_dep, $id_gare_arr)
    {
        $this->id          = $id;
        $this->date_dep    = $date_dep;
        $this->date_arr    = $date_arr;
        $this->cap_voyage  = $cap_voyage;
        $this->prix_voyage = $prix_voyage;
        $this->id_train    = $id_train;
        $this->id_gare_dep = $id_gare_dep;
        $this->id_gare_arr = $id_gare_arr;
    }

    //setters
    public function setIdVoyage($id_voyage)
    {
        $this->id = $id_voyage;
    }

    public function setDatedepVoyage($date_dep_voyage)
    {
        $this->date_dep = $date_dep_voyage;
    }

    public function setDatearrVoyage($date_arr_voyage)
    {
        $this->date_arr = $date_arr_voyage;
    }
    
    public function setCapaciteVoyage($cap_voyage)
    {
        $this->cap_voyage = $cap_voyage;
    }
    
    public function setPrixVoyage($prix_voyage)
    {
        $this->prix_voyage = $prix_voyage;
    }
    
    public function setTrainVoyage($id_train_voyage)
    {
        $this->id_train = $id_train_voyage;
    }
    
    public function setGaredepVoyage($id_gare_dep_voyage)
    {
        $this->id_gare_dep = $id_gare_dep_voyage;
    }
    
    public function setGarearrVoyage($id_gare_arr_voyage)
    {
        $this->id_gare_arr = $id_gare_arr_voyage;
    }
    
    //gettters
    public function getidVoyage()
    {
        return $this->id;
    }

    public function getdatedepVoyage()
    {
        return $this->date_dep;
    }

    public function getdatearrVoyage()
    {
        return $this->date_arr;
    }
    
    public function getcapaciteVoyage()
    {
        return $this->cap_voyage;
    }
    
    public function getPrixVoyage()
    {
        return $this->prix_voyage;
    }
    
    public function getTrainVoyage()
    {
        return $this->id_train;
    }
    
    public function getGaredepVoyage()
    {
        return $this->id_gare_dep;
    }
    
    public function getGarearrVoyage()
    {
        return $this->id_gare_arr;
    }
}