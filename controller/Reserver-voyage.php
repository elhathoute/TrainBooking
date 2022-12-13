<?php

require_once '../modal/reservationsModal.php';
require_once '../classes/reservations.class.php';
session_start();

if (isset($_POST['save'])) saveReservation();

function saveReservation(){


$idVoyage=$_POST['reservation-voyage'];

//reservation
$id='';
$date_reservation=$_POST['reservation-date'];
$user_reservation=$_POST['reservation-user'];
$voyage_reservation=$_POST['reservation-voyage'];
$etat_reservation=$_POST['reservation-etat'];
$cap_reservation=$_POST['reservation-capacite'];	
$reservation= new ResevationModal();
$reservation->insertReservation(new Reserve($id,$date_reservation, $user_reservation, $voyage_reservation, $etat_reservation,$cap_reservation));
$reservation->updateVoyages($idVoyage,$cap_reservation);
// setcookie('reservation', 1, time() + (86400 * 30), "/");
header('location:../result.php');
}

?>