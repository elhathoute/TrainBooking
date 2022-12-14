<?php

require_once '../modal/garesModal.php';
session_start();

if (isset($_POST['delete-gare']))  deleteGare();
function deleteGare(){

    $id=$_POST['gare-delete-id'];

    $gare = new GaresModal();
    $gare->deleteGare($id);
        $_SESSION['add-gare'] = 'gare supprimer avec succée !';
    header('location:../view/gares.php');
}




?>