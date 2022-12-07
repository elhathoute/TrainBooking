<?php
require_once '../modal/usersModal.php';

$id=$_GET['id'];
$role_user=$_GET['role'];
if($role_user==1){
    $role = 2;
}else{
    $role = 1;
}
$user = new UsersModal();
$user->chnagerRoleUser($role,$id);
header('location:../view/users.php');
?>