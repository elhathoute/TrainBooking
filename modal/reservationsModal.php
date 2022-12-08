<?php
require_once 'dbTrain.php';

    class ResevationModal extends DbTrain {
       
     
        public function getReservation(){
        $sql = "SELECT reservations.*,users.nom as 'user' FROM reservations 
    left join users on reservations.id_user=users.id ";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
      
    
    //     public function insertGare($id,$nom,$ville){
    //         $sql = "INSERT INTO gares (id,nom,id_ville) VALUES(?,?,?)";
    //         $stm = $this->connexion()->prepare($sql);
    //          $stm->execute([$id,$nom,$ville]);
    //         }
    //         public function  updateGare($nom,$ville,$id){
    //             $sql = "UPDATE  gares set nom=?,id_ville=? where id=?";
    //             $stm = $this->connexion()->prepare($sql);
    //              $stm->execute([$nom,$ville,$id]);
    //             }
    // public function deleteGare($id){
    //     $sql = "DELETE FROM gares  where id=?";
    //             $stm = $this->connexion()->prepare($sql);
    //              $stm->execute([$id]);
    // }
          
}