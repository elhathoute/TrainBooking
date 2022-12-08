<?php


require_once '../modal/voyagesModal.php';
session_start();

if (isset($_POST['save'])) saveVoyage();

function saveVoyage(){
    $id='';
    $date_dep =$_POST['voyage-date-dep'];
    $date_arr =$_POST['voyage-date-arr'];
    $train =$_POST['voyage-train'];
    $gare_dep =$_POST['voyage-gare-dep'];
    $gare_arr =$_POST['voyage-gare-arr'];
    $classe =$_POST['voyage-classe'];

    
$voyage = new VoyagesModal();
$voyage->insertVoyage($id, $date_dep, $date_arr, $train, $gare_dep, $gare_arr,$classe);
    $_SESSION['add-voyage'] = 'voyage ajouter avec succée !';
header('location:../view/voyages.php');
}

// echo $date_dep . '  ' . $date_arr.''.$train.''.$gare_dep.''.$gare_arr.''.$classe;
?>