<?php

require_once '../modal/reservationsModal.php';
require_once '../classes/reservations.class.php';
session_start();

// echo 'hello'

if (isset($_POST['update'])) updateReservations();

function updateReservations(){
 $id=$_POST['id'];
 $date_reservation=$_POST['reservation-date'];
 $user_reservation=$_POST['reservation-user'];
 $voyage_reservation=$_POST['reservation-voyage'];
 $etat_reservation=$_POST['reservation-etat'];


 $reservation= new ResevationModal();
 $reservation->updateReservation(new Reserve($id,$date_reservation, $user_reservation, $voyage_reservation, $etat_reservation));
     $_SESSION['add-reservation'] = 'reservation editer avec succée !';
     
 header('location:../view/reservations.php');
 }



?>