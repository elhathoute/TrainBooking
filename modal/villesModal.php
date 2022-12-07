<?php
require_once 'dbTrain.php';

    class VillesModal extends DbTrain {
       
     
        public function getVilles(){
        $sql = "SELECT * from villes";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
      
  
          
}