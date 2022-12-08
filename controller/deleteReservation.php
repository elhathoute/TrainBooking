<?php

require_once '../modal/reservationsModal.php';
require_once '../classes/reservations.class.php';
session_start();


 $id=$_GET['id'];

$reservation = new ResevationModal();
$reservation->deleteReservation($id);
    $_SESSION['add-reservation'] = 'raservation supprimer avec succée !';
header('location:../view/reservations.php');



?>