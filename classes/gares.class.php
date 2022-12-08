<?php

class Gares {
    // Properties
    private $id;
    private $nom;
    private $id_ville;

    // method
    public function __construct($id, $nom, $id_ville)
    {
        $this->id       = $id;
        $this->nom     = $nom;
        $this->id_ville = $id_ville;
    }

    //setters
    public function setIdGare($id_gare)
    {
        $this->id = $id_gare;
    }

    public function setNomGare($nom_gare)
    {
        $this->nom = $nom_gare;
    }

    public function setVilleGare($id_ville_gare)
    {
        $this->id_ville = $id_ville_gare;
    }
    
    //gettters
    public function getIdGare()
    {
        return $this->id;
    }
    
    public function getNomGare()
    {
        return $this->nom;
    }
    
    public function getVilleGare()
    {
        return $this->id_ville;
    }
}
