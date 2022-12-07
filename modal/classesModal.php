<?php
require_once 'dbTrain.php';

    class ClassesModal extends DbTrain {
       
     
        public function getClasses(){
        $sql = "SELECT * FROM classes ";
        $stm = $this->connexion()->query($sql);
        return $stm;
        }
    }

    ?>