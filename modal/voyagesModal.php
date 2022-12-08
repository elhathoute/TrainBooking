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
            public function deleteVoyage($id){
                $sql = "DELETE FROM voyages  where id=?";
                        $stm = $this->connexion()->prepare($sql);
                         $stm->execute([$id]);
            }

            public function  updateVoyage($date_dep, $date_arr, $train, $gare_dep, $gare_arr,$classe,$id){
                $sql = "UPDATE `voyages` SET `date_dep`=?,`date_arr`=?,`id_train`=?,`id_gare_dep`=?,`id_gare_arr`=?,`id_classe`=? WHERE id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$date_dep, $date_arr, $train, $gare_dep, $gare_arr,$classe,$id]);
                }
                
}