<?php

require_once '../modal/trainesModal.php';
session_start();

if (isset($_POST['save'])) saveTrain();

function saveTrain(){
$id='';
$nom=$_POST['nom-train'];
$cap_train=$_POST['train-capacite'];
$vitesse=$_POST['train-vitesse'];
$etat=1;

$train = new TrainesModal();
$train->insertTraine($id, $nom, $cap_train, $vitesse, $etat);
    $_SESSION['add-train'] = 'tarin ajouter avec succée !';
header('location:../view/traines.php');
}

?>