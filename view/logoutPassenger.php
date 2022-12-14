<?php

setcookie("email_cookie","", time() -(60*60*24), "/");
setcookie("password_cookie","", time() - (60*60*24), "/");  
header('location:../index.php');
?>