<?php
require_once 'dbTrain.php';
// include_once '../classes/gares.class.php';

    class GaresModal extends DbTrain {
       
     
        public function getGares(){
        $sql = "SELECT gares.*,villes.nom as 'ville',villes.id as 'id-ville' FROM gares left join villes on gares.id_ville=villes.id ";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
      
    
        public function insertGare(Gares $gare){
            $sql = "INSERT INTO gares (id,nom,id_ville) VALUES(?,?,?)";
            $stm = $this->connexion()->prepare($sql);
             $stm->execute([$gare->getIdGare(),$gare->getNomGare(),$gare->getVilleGare()]);
            }
            public function  updateGare(Gares $gare){
                $sql = "UPDATE  gares set nom=?,id_ville=? where id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$gare->getNomGare(),$gare->getVilleGare(),$gare->getIdGare()]);
                }
    public function deleteGare($id){
        $sql = "DELETE FROM gares  where id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$id]);
    }
    public function searchby($table,$by,$id){
        $sql = "SELECT * FROM $table WHERE $by ='$id'";
            $exe = $this->connexion()-> query($sql);
            $res = $exe->fetch();
            return $res;

    }
          
}