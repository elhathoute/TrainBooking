<?php

include '../modal/usersModal.php';
$id='';
$nom=$_GET['nom-user'];
$email=$_GET['email-user'];
$role=2;
// echo $nom;
//getAll users
$user = new UsersModal();
$user->insertUser($id,$nom,$email,$role);
echo $id.$nom.$email.$role;
header('location:../view/users.php');
?>