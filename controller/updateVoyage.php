<?php

require_once '../modal/voyagesModal.php';
require_once '../classes/voyages.class.php';
session_start();

if (isset($_POST['update'])) updateVoyage();

function updateVoyage(){
 $id=$_POST['id'];
 $date_dep =$_POST['voyage-date-dep'];
 $date_arr =$_POST['voyage-date-arr'];
 $cap_voyage =$_POST['cap-voyage'];
 $prix_voyage =$_POST['prix-voyage'];
 $train =$_POST['voyage-train'];
 $gare_dep =$_POST['voyage-gare-dep'];
 $gare_arr =$_POST['voyage-gare-arr'];


$voyage = new VoyagesModal();
<<<<<<< HEAD
<<<<<<< HEAD
$voyage->updateVoyage(new Voyages($id,$date_dep, $date_arr,$cap_voyage,$prix_voyage, $train, $gare_dep, $gare_arr));
=======
$voyage->updateVoyage(new Voyages($id,$date_dep,$date_arr,$cap_voyage,$prix_voyage,$train,$gare_dep,$gare_arr));
>>>>>>> 71e93236d5122f056109027cc4b80156ed5cf66c
=======
$voyage->updateVoyage(new Voyages($id,$date_dep,$date_arr,$cap_voyage,$prix_voyage,$train,$gare_dep,$gare_arr));
>>>>>>> 71e93236d5122f056109027cc4b80156ed5cf66c
    $_SESSION['add-voyage'] = 'voyage editer avec succée !';
header('location:../view/voyages.php');

}

?>