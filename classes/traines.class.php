<?php

  class Traines {
    //prop
    protected $id;
    protected $nom;
    protected $cap_first;
    protected $cap_second;
    protected $vitesse;
    protected $etat;

    //constr
    public function __construct($id_trian,$nom_train,$cap_first_train,$cap_second_train,$vitesse_train,$etat_train)
    {
    $this->id = $id_trian;
    $this->nom = $nom_train;
    $this->cap_first = $cap_first_train;
    $this->cap_second= $cap_second_train;
    $this->vitesse = $vitesse_train;
    $this->etat = $etat_train;
    }
    //setters
    protected function setId($id_trian){
    $this->id = $id_trian;
    } 
    protected function setNom($nom_train){
      $this->nom = $nom_train;
      }
      protected function setCapFirst($cap_first_train){
        $this->cap_first = $cap_first_train;
        }
        protected function setCapSecond($cap_second_train){
          $this->cap_second = $cap_second_train;
          }
          protected function setVitesse($vitesse_train){
            $this->vitesse = $vitesse_train;
            }
            protected function setEtat($etat_train){
              $this->etat = $etat_train;
              }
//gettters

 protected function getId(){
    return $this->id;
 }
 protected function getNom(){
  return $this->nom;
}
protected function getCapFirst(){
  return $this->cap_first;
}
protected function getCapSecond(){
  return $this->cap_second;
}
protected function getVitesse(){
  return $this->vitesse;
}
protected function getEtat(){
  return $this->etat;
}





  }





?>