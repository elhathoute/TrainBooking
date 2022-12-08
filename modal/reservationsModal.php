<?php
require_once 'dbTrain.php';

    class ResevationModal extends DbTrain {
       
     
        public function getReservation(){
        $sql = "SELECT reservations.*,users.nom as 'user' FROM reservations 
    left join users on reservations.id_user=users.id ";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
      
    
        public function insertReservation(Reserve $reservation){
            $sql = "INSERT INTO `reservations`(`id`, `date_reserve`, `id_user`, `id_voyage`, `etat`) VALUES(?,?,?,?,?)";
            $stm = $this->connexion()->prepare($sql);
             $stm->execute([$reservation->getIdReserve(),$reservation->getDateReserve(),$reservation->getIduserReserve(),$reservation->getIdvoyageReserve(),$reservation->getEtatReserve()]);
            }
            public function  updateReservation(Reserve $reservation){
                $sql = "UPDATE reservations SET date_reserve=?,id_user=?,id_voyage=?,etat=? WHERE id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$reservation->getDateReserve(),$reservation->getIduserReserve(),$reservation->getIdvoyageReserve(),$reservation->getEtatReserve(),$reservation->getIdReserve()]);
                }
    public function deleteReservation($id){
        $sql = "DELETE FROM reservations  where id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$id]);
    }
          
}