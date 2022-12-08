<?php

require_once '../modal/voyagesModal.php';
session_start();

if (isset($_POST['update'])) updateVoyage();

function updateVoyage(){
 $id=$_POST['id'];
 $date_dep =$_POST['voyage-date-dep'];
 $date_arr =$_POST['voyage-date-arr'];
 $train =$_POST['voyage-train'];
 $gare_dep =$_POST['voyage-gare-dep'];
 $gare_arr =$_POST['voyage-gare-arr'];
 $classe =$_POST['voyage-classe'];

$voyage = new VoyagesModal();
$voyage->updateVoyage($date_dep, $date_arr, $train, $gare_dep, $gare_arr,$classe,$id);
    $_SESSION['add-voyage'] = 'voyage editer avec succée !';
header('location:../view/voyages.php');

}

?>