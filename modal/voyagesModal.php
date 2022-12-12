<?php
require_once 'dbTrain.php';

    class VoyagesModal extends DbTrain {
       
     
        public function getVoyages(){
        $sql = "SELECT * FROM voyages ";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
        public function insertVoyage(Voyages $voyage){
            $sql = "INSERT INTO `voyages`(`id`, `date_dep`, `date_arr`, `cap_voyage`, `prix_voyage`, `id_train`, `id_gare_dep`, `id_gare_arr`) VALUES(?,?,?,?,?,?,?,?)";
            $stm = $this->connexion()->prepare($sql);
             $stm->execute([$voyage->getidVoyage(),$voyage->getdatedepVoyage(),$voyage->getdatearrVoyage(),$voyage->getcapaciteVoyage(),$voyage->getPrixVoyage(),$voyage->getTrainVoyage(),$voyage->getGaredepVoyage(),$voyage->getGarearrVoyage()]);
            }
            public function deleteVoyage($id){
                $sql = "DELETE FROM voyages  where id=?";
                        $stm = $this->connexion()->prepare($sql);
                         $stm->execute([$id]);
            }

            public function  updateVoyage(Voyages $voyage){
                $sql = "UPDATE `voyages` SET `date_dep`=?,`date_arr`=?,`cap_voyage`=?,`prix_voyage`=?,`id_train`=?,`id_gare_dep`=?,`id_gare_arr`=? WHERE id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$voyage->getdatedepVoyage(),$voyage->getdatearrVoyage(),$voyage->getcapaciteVoyage(),$voyage->getPrixVoyage(),$voyage->getTrainVoyage(),$voyage->getGaredepVoyage(),$voyage->getGarearrVoyage(),$voyage->getidVoyage()]);
                }

                public function searchVoyage($gare_depart,$gare_arr){
                    $sql = "SELECT * FROM voyages where id_gare_dep=? and id_gare_arr=?";
                    $stm = $this->connexion()->prepare($sql);
                    $stm->execute([$gare_depart,$gare_arr]);
                    return $stm->fetchAll();
                }
                
}