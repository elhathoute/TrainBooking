<?php

require_once '../modal/trainesModal.php';
session_start();

if (isset($_POST['update'])) updateTrain();

function updateTrain(){
 $id=$_POST['id'];
$nom=$_POST['nom-train'];
$cap_first=$_POST['train-cap-first'];
$cap_second=$_POST['train-cap-second'];
$vitesse=$_POST['train-vitesse'];
$etat=$_POST['train-etat'];


$train = new TrainesModal();
$train->updateTraine($nom, $cap_first, $cap_second, $vitesse,$etat,$id);
    $_SESSION['add-train'] = 'tarin editer avec succée !';
header('location:../view/traines.php');

}

?>