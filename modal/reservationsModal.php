<?php
require_once 'dbTrain.php';

    class ResevationModal extends DbTrain {
       
     
        public function getReservation(){
        $sql = "SELECT reservations.*,users.nom as 'user',users.id as'id-user' FROM reservations 
        left join users on reservations.id_user=users.id ";
        $stm = $this->connexion()->query($sql);
        $result = $stm->fetchAll();
        return $result;
        }
      
    
        public function insertReservation(Reserve $reservation){
            $sql = "INSERT INTO `reservations`(`id`, `date_reserve`, `id_user`, `id_voyage`, `etat`,`cap_reservation`) VALUES(?,?,?,?,?,?)";
            $stm = $this->connexion()->prepare($sql);
             $stm->execute([$reservation->getIdReserve(),$reservation->getDateReserve(),$reservation->getIduserReserve(),$reservation->getIdvoyageReserve(),$reservation->getEtatReserve(),$reservation->getCapReservation()]);
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
     public function updateVoyages($id,$nmbr){
        $sql = 'UPDATE `voyages` SET cap_voyage = cap_voyage - ? where id = ?';
        $exe =$this->connexion()-> prepare($sql);
        $exe ->execute([$nmbr,$id]);
    }


    public function getOneReservation($id){
        $sql = "SELECT reservations.*,users.nom as 'user',voyages.prix_voyage as 'prix' FROM reservations 
        left join users on reservations.id_user=users.id 
        left join voyages on reservations.id_voyage=voyages.id 
        where id_user=?";
        $stm = $this->connexion()->prepare($sql);
        $stm->execute([$id]);
        $res = $stm->fetchAll();
        return $res; 
        }


    public function getReservationPrint($id)
    {
        $sql = "SELECT reservations.*,users.nom as 'user',voyages.prix_voyage as 'prix' FROM reservations 
            left join users on reservations.id_user=users.id 
            left join voyages on reservations.id_voyage=voyages.id 
            where reservations.id=?";
        $stm = $this->connexion()->prepare($sql);
        $stm->execute([$id]);
        $res = $stm->fetch();
        return $res;
    }
          
}