<?php

require_once '../modal/trainesModal.php';
require_once '../classes/traines.class.php';
session_start();

if (isset($_POST['save'])) saveTrain();

function saveTrain(){
$id='';
$nom=$_POST['nom-train'];
$cap_train=$_POST['train-capacite'];
$vitesse=$_POST['train-vitesse'];
$etat=1;

$train = new TrainesModal();
$train->insertTraine(new Traines($id, $nom, $cap_train, $vitesse, $etat));
    $_SESSION['add-train'] = 'tarin ajouter avec succée !';
    // var_dump(new Traines($id, $nom, $cap_train, $vitesse, $etat));
header('location:../view/traines.php');
}

?>