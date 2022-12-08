<?php

require_once '../modal/trainesModal.php';
session_start();

// echo 'hello'

if (isset($_POST['update'])) updateTrain();

function updateTrain(){
 $id=$_POST['id'];
$nom=$_POST['nom-train'];
$cap_train=$_POST['train-capacite'];
$vitesse=$_POST['train-vitesse'];
$etat=$_POST['train-etat'];


$train = new TrainesModal();
$train->updateTraine(new Traines($id,$nom,$cap_train, $vitesse,$etat));
    // var_dump(new Traines($id,$nom, $cap_train, $vitesse,$etat));
    $_SESSION['add-train'] = 'tarin editer avec succée !';
header('location:../view/traines.php');

}

?>