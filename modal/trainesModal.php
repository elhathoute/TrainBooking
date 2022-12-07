<?php
require_once 'dbTrain.php';

    class TrainesModal extends DbTrain {
       
     
        public function getTraines(){
        $sql = "SELECT * FROM trains ";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
      
    
        public function insertTraine($id,$nom,$cap_first,$cap_second,$vitesse,$etat){
            $sql = "INSERT INTO trains (id,nom,capacite_first,capacite_second,vitesse,etat) VALUES(?,?,?,?,?,?)";
            $stm = $this->connexion()->prepare($sql);
             $stm->execute([$id,$nom,$cap_first,$cap_second,$vitesse,$etat]);
            }
            public function  updateTraine($nom,$cap_first,$cap_second,$vitesse,$etat,$id){
                $sql = "UPDATE  trains set nom=?,capacite_first=?,capacite_second=?,vitesse=?,etat=? where id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$nom,$cap_first,$cap_second,$vitesse,$etat,$id]);
                }
    public function deleteTraine($id){
        $sql = "DELETE FROM trains  where id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$id]);
    }
          
}