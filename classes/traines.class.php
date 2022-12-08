<?php

  class Traines {
    //prop
    private $id;
    private $nom;
    private $cap_train;
    private $vitesse;
    private $etat;

    //constr
    public function __construct($id_trian,$nom_train,$cap_train,$vitesse_train,$etat_train)
    {
    $this->id = $id_trian;
    $this->nom = $nom_train;
    $this->cap_train = $cap_train;
    $this->vitesse = $vitesse_train;
    $this->etat = $etat_train;
    }
    //setters
    public function setId($id_trian){
    $this->id = $id_trian;
    } 
    public function setNom($nom_train){
      $this->nom = $nom_train;
      }
      public function setCapacite($cap_train){
        $this->$cap_train = $$cap_train;
        }
      
          public function setVitesse($vitesse_train){
            $this->vitesse = $vitesse_train;
            }
            public function setEtat($etat_train){
              $this->etat = $etat_train;
              }
//gettters

 public function getId(){
    return $this->id;
 }
 public function getNom(){
  return $this->nom;
}
public function getCapacite(){
  return $this->cap_train;
}
public function getVitesse(){
  return $this->vitesse;
}
public function getEtat(){
  return $this->etat;
}





  }





?>