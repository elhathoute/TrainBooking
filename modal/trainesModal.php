<?php
require_once 'dbTrain.php';
require_once '../classes/traines.class.php';


    class TrainesModal extends DbTrain {
       
     
        public function getTraines(){
        $sql = "SELECT * FROM trains ";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
      
    
        public function insertTraine(Traines $train){
            $sql = "INSERT INTO trains (id,nom,capacite_train,vitesse,etat) VALUES(?,?,?,?,?)";
            $stm = $this->connexion()->prepare($sql);
             $stm->execute([$train->getId(),$train->getNom(),$train->getCapacite(),$train->getVitesse(),$train->getEtat()]);
            }
            public function  updateTraine(Traines $train){
                $sql = "UPDATE  trains set nom=?,capacite_train=?,vitesse=?,etat=? where id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$train->getNom(),$train->getCapacite(), $train->getVitesse(),$train->getEtat(),$train->getId()]);
                }
    public function deleteTraine($id){
        $sql = "DELETE FROM trains  where id=?";
                $stm = $this->connexion()->prepare($sql);
                 $stm->execute([$id]);
    }

    public function searchTrain($nom){
        $sql = "SELECT * FROM gares WHERE nom like ? ORDER BY nom";
        $stm = $this->connexion()->prepare($sql);
        $stm->execute([$nom]);
        $result = $stm->fetchAll();
        return $result;
    }

    
          
          
}