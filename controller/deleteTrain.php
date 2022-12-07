<?php

require_once '../modal/trainesModal.php';
session_start();


 $id=$_GET['id'];

$train = new TrainesModal();
$train->deleteTraine($id);
    $_SESSION['add-train'] = 'tarin supprimer avec succée !';
header('location:../view/traines.php');



?>