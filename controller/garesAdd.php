<?php

require_once '../modal/garesModal.php';
session_start();

if (isset($_POST['save'])) saveGare();

function saveGare(){
$id='';
$nom=$_POST['nom-gare'];
$ville=$_POST['gare-ville'];


$gare= new GaresModal();
$gare->insertGare($id,$nom,$ville);
    $_SESSION['add-gare'] = 'gare ajouter avec succée !';
header('location:../view/gares.php');
}

?>