<?php

require_once '../modal/garesModal.php';
session_start();


 $id=$_GET['id'];

$gare = new GaresModal();
$gare->deleteGare($id);
    $_SESSION['add-gare'] = 'gare supprimer avec succée !';
header('location:../view/gares.php');



?>