<?php

require_once '../modal/voyagesModal.php';
session_start();


 $id=$_GET['id'];

$voyage = new VoyagesModal();
$voyage->deleteVoyage($id);
    $_SESSION['add-voyage'] = 'voyage supprimer avec succée !';
header('location:../view/voyages.php');



?>