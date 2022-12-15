<?php 
include('../classes/users.classes.php');
// session_start();
if(isset($_POST['signin'])){
    setcookie("email_cookie",$_POST['loginemail'], time() + (60*60*24), "/");

if(user::signin($_POST['loginemail'],$_POST['loginpass'])){
    if(isset($_POST['RMcheckbox'])){
        setcookie("email_cookie",$_POST['loginemail'], time() + (60*60*24), "/");
        setcookie("password_cookie",$_POST['loginpass'], time() + (60*60*24), "/");  
}
$user = user::checkEtat($_POST['loginemail']);
        $_SESSION['user'] = $user;
if($user['id_role']==2) header('location:../index.php');
else                    header('location:index.php');
          

var_dump($user['id_role']);
die();   
       
    // header('location:header.php');
}else{
    $_SESSION['message'] = "Your data dosn't match with our records";
    header('location:signin.php');
}

}
if(isset($_POST['register'])){

    $user = new user($_POST['username'],$_POST['email'],$_POST['password'],$_POST['rpassword']);
    if($user->checkdata()){
        $user->insertuser();
        setcookie("email_cookie",$_POST['email'], time() + (60*60*24), "/");
    setcookie("password_cookie","", time(), "/");
    }else{
        $_SESSION['message'] = $user->errormsg;
    }
    
    header('location:signin.php');
    }

if(isset($_POST['signin1'])){
        setcookie("email_cookie",$_POST['loginemail1'], time() + (60*60*24), "/");
    
    if(user::signin($_POST['loginemail1'],$_POST['loginpass1'])){
        if(isset($_POST['RMcheckbox1'])){
            setcookie("email_cookie",$_POST['loginemail1'], time() + (60*60*24), "/");
            setcookie("password_cookie",$_POST['loginpass1'], time() + (60*60*24), "/");
    }
        $_SESSION['user'] = user::signin($_POST['loginemail1'],$_POST['loginpass1']);
        header('location:header.php');
    }else{
        header('location:header.php');
    }}


//update profile
    if(isset($_POST['update_profile'])){
    $nom = $_POST['yourname'];
    $email = $_POST['email'];
    $id= $_SESSION['user']['id'];
    $user = new user($nom,$email,null,null);
    if(preg_match("/^[a-zA-Z ]*$/",$user->nom) && (filter_var($user->email, FILTER_VALIDATE_EMAIL))){
        $user->updateUser($id);
       $_SESSION['user']['nom']=$nom;
       $_SESSION['user']['email']= $email ;
        header('location:http://localhost/dashboard-version-3/index.php');
    }
    else{
        header('location:http://localhost/dashboard-version-3/view/profile.php');
    }
  
    }
if (isset($_POST['delete_profile'])) {
    user::deleteUser($_SESSION['user']['id']);
    header('location:http://localhost/dashboard-version-3/index.php');
    unset($_SESSION['user']);
}



if(isset($_POST['logout'])){user::logout();header('location:header.php');}

?>
