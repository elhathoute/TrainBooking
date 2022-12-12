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

                // public function searchVoyage($gare_depart,$gare_arr){
                //     $sql = "SELECT * FROM voyages where id_gare_dep=? and id_gare_arr=?";
                //     $stm = $this->connexion()->prepare($sql);
                //     $stm->execute([$gare_depart,$gare_arr]);
                //     return $stm->fetchAll();
                // }
                public function searchvoyage($gd = 'any(SELECT `id_gare_dep` FROM `voyages`)',$ga = 'any(SELECT `id_gare_arr` FROM `voyages`)'){
                    $now = date('20y-m-d h:m:s');
                    $sql = "SELECT voyages.*,trains.nom as 'train-nom' FROM voyages left join trains on voyages.id_train=trains.id WHERE id_gare_dep = $gd and id_gare_arr = $ga and date_dep >= '$now' and cap_voyage<>0 ";
                    $stm =$this->connexion()->query($sql);
                    $rows = $stm->fetchAll();
                    return $rows; 
                }

                function secsToStr($d1,$d2){ 
                    $r='';
                    $d1 = strtotime($d1);
                    $d2 = strtotime($d2);
                    $secs = abs($d1-$d2); 
                    if($secs>=3600){$hours=floor($secs/3600);$secs=$secs%3600;$r.=$hours.'h';}  
                    if($secs>=60){$minutes=floor($secs/60);$secs=$secs%60;$r.=$minutes.'min';}
                    return $r;  
                }
                
}