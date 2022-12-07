<?php
require_once 'dbTrain.php';

    class VoyagesModal extends DbTrain {
       
     
        public function getVoyages(){
        $sql = "SELECT * FROM voyages ";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
        public function insertVoyage($id,$date_dep,$date_arr,$train,$gare_dep,$gare_arr,$classe){
            $sql = "INSERT INTO `voyages`(`id`, `date_dep`, `date_arr`, `id_train`, `id_gare_dep`, `id_gare_arr`, `id_classe`) VALUES(?,?,?,?,?,?,?)";
            $stm = $this->connexion()->prepare($sql);
             $stm->execute([$id,$date_dep,$date_arr,$train,$gare_dep,$gare_arr,$classe]);
            }
    
}