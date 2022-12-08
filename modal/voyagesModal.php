<?php
require_once 'dbTrain.php';

    class VoyagesModal extends DbTrain {
       
     
        public function getVoyages(){
        $sql = "SELECT * FROM voyages ";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
        public function insertVoyage($id,$date_dep,$date_arr,$cap_voyage,$prix_voyage,$train,$gare_dep,$gare_arr){
            $sql = "INSERT INTO `voyages`(`id`, `date_dep`, `date_arr`, `cap_voyage`, `prix_voyage`, `id_train`, `id_gare_dep`, `id_gare_arr`) VALUES(?,?,?,?,?,?,?,?)";
            $stm = $this->connexion()->prepare($sql);
             $stm->execute([$id,$date_dep,$date_arr,$cap_voyage,$prix_voyage,$train,$gare_dep,$gare_arr]);
            }
            public function deleteVoyage($id){
                $sql = "DELETE FROM voyages  where id=?";
                        $stm = $this->connexion()->prepare($sql);
                         $stm->execute([$id]);
            }

            public function  updateVoyage($id,$date_dep, $date_arr,$cap_voyage,$prix_voyage, $train, $gare_dep, $gare_arr){
                $sql = "UPDATE `voyages` SET `date_dep`=?,`date_arr`=?,`cap_voyage`=?,`prix_voyage`=?,`id_train`=?,`id_gare_dep`=?,`id_gare_arr`=? WHERE id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$date_dep, $date_arr,$cap_voyage,$prix_voyage, $train, $gare_dep, $gare_arr,$id]);
                }
                
}