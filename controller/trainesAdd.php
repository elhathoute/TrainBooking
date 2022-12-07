<?php

require_once '../modal/trainesModal.php';
session_start();

if (isset($_POST['save'])) saveTrain();

function saveTrain(){
$id='';
$nom=$_POST['nom-train'];
$cap_first=$_POST['train-cap-first'];
$cap_second=$_POST['train-cap-second'];
$vitesse=$_POST['train-vitesse'];
$etat=1;

$train = new TrainesModal();
$train->insertTraine($id, $nom, $cap_first, $cap_second, $vitesse, $etat);
    $_SESSION['add-train'] = 'tarin ajouter avec succée !';
header('location:../view/traines.php');
}

?>