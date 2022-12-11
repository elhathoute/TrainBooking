<?php

require_once '../modal/garesModal.php';
require_once '../classes/gares.class.php';
session_start();

if (isset($_POST['update'])) updateGare();

function updateGare(){
 $id=$_POST['id'];
$nom=$_POST['nom-gare'];
$ville=$_POST['gare-ville'];



$gare = new GaresModal();
$gare->updateGare(new Gares($id,$nom,$ville));
    $_SESSION['add-gare'] = 'gare editer avec succée !';
header('location:../view/gares.php');

}

?>