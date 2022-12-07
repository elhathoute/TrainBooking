<?php
require_once 'dbTrain.php';

    class GaresModal extends DbTrain {
       
     
        public function getGares(){
        $sql = "SELECT gares.*,villes.nom as 'ville',villes.id as 'id-ville' FROM gares left join villes on gares.id_ville=villes.id ";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
      
    
        public function insertGare($id,$nom,$ville){
            $sql = "INSERT INTO gares (id,nom,id_ville) VALUES(?,?,?)";
            $stm = $this->connexion()->prepare($sql);
             $stm->execute([$id,$nom,$ville]);
            }
            public function  updateGare($nom,$ville,$id){
                $sql = "UPDATE  gares set nom=?,id_ville=? where id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$nom,$ville,$id]);
                }
    public function deleteGare($id){
        $sql = "DELETE FROM gares  where id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$id]);
    }
          
}