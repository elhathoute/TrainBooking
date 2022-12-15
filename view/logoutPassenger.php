<?php

setcookie("email_cookie","", time() -(60*60*24), "/");
setcookie("password_cookie","", time() - (60*60*24), "/");
session_destroy();  
header('location:http://localhost/dashboard-version-3/index.php');
?>