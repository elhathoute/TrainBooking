<?php

include('script.php');

?>







<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" type="" href="../img/icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <title>Sign In Page</title>
</head>
<body>
    <div class="containe">
        <ul class="d-flex justify-content-between mb-4 p-0">
            <li id="buttonS" class="btn my-3 w-50 me-2 ms-0 rounded-pill" onclick="signinF()">Sign In</li>
            <li id="buttonR" class="btn my-3 w-50 ms-2 rounded-pill" onclick="registerF()">Register Now</li>
        </ul>
        <?php if (isset($_SESSION['message'])){
				echo '<div style="background-color: red;color: #fff;" class="alert alert-dismissible fade show rounded-pill py-2" id="alert" >
                <i class="fa-solid fa-xmark ms-2"></i>
				<strong>Failed !</strong> 
						'. $_SESSION["message"].'
					</div>';
				unset($_SESSION['message']);};
          ?>
          
      <form action="script.php" id="formbody" class="mb-2" method="post">
        <div class="form-outline mb-4">
            <input type="email" id="loginName" name="loginemail" class="rounded-pill w-100" placeholder=" " value = "<?php if(isset($_COOKIE['email_cookie'])) echo $_COOKIE['email_cookie']; ?>"  required oninvalid="setCustomValidity('Please Entre A Valid Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#009EFF solid 2px';this.nextElementSibling.style.color = '#0008C1'"/>
            <label class="form-label" for="loginName" id="NameLabel">Email</label>
        </div>
        <div class="form-outline">
            <input type="password" id="loginPassword" name="loginpass" class="rounded-pill w-100" placeholder=" " value="<?php if(isset($_COOKIE['password_cookie'])) echo $_COOKIE['password_cookie']; ?>" required onkeyup="counter()" oninvalid="setCustomValidity('Please Entre Password');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#009EFF solid 2px';this.nextElementSibling.style.color = '#0008C1'"/>
            <label class="form-label" for="loginPassword" id="PasswordLabel">Password</label>
            <span class="input-group-append" id="icon1">
                <i class="fa-regular fa-eye p-2" style="color: #009EFF;" onclick="displayPassword()"></i>
            </span>
            <span class="input-group-append" id="icon2">
                <i class="fa-regular fa-eye-slash p-2" style="color: #009EFF;" onclick="hidePassword()"></i>
            </span>
          </div>
              <!-- Checkbox -->
              <div class="my-3 d-flex justify-content-between">
                <div class="form-check form-switch ms-4">
                <input id="flexSwitchCheckDefault" class="form-check-input" type="checkbox" name="RMcheckbox"/>
                <label class="form-check-label text-dark" for="loginCheck">Remember me</label></div>
                <button style="color: #0008C1;" class="btn me-4 bg-transparent p-0" onclick="passReset()">Forgot password?</button>
              </div>
        <button type="submit" id="signin" name="signin" style="background-color: #009EFF;" class="btn w-100 mb-4 rounded-pill text-white">Sign in</button>
        <a href="../index.php" title="out" class="btn btn-outline-danger w-100 rounded-pill"><i class="fa fa-hand-o-left" aria-hidden="true"></i></a>
        
      </form>
    </div>
    
</body>
<script src="https://kit.fontawesome.com/16f6b89e3c.js" crossorigin="anonymous"></script>

<script >
document.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("signin").click();
  }
});
function displayPassword(){
    document.getElementById("icon1").style.display = "none"
    document.getElementById("icon2").style.display = "block"
    document.getElementById("loginPassword").removeAttribute("type")
}
function hidePassword(){
    document.getElementById("icon2").style.display = "none"
    document.getElementById("icon1").style.display = "block"
    document.getElementById("loginPassword").setAttribute("type","password")
}
function signinF(){
    document.getElementById("buttonS").style.backgroundColor = "#0008C1",
    document.getElementById("buttonR").style.backgroundColor = "#009EFF",
    document.getElementById("formbody").innerHTML = `
    <div class="form-outline mb-4">
            <input type="email" id="loginName" name="loginemail" class="rounded-pill w-100" placeholder=" " value = "<?php  if(isset($_COOKIE['email_cookie'])) echo $_COOKIE['email_cookie']; ?>" required oninvalid="setCustomValidity('Please Entre A Valid Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#009EFF solid 2px';this.nextElementSibling.style.color = '#0008C1'"/>
            <label class="form-label" for="loginName" id="NameLabel">Email</label>
        </div>
        <div class="form-outline">
            <input type="password" id="loginPassword" name="loginpass" class="rounded-pill w-100" placeholder=" " value="<?php if(isset($_COOKIE['password_cookie'])) echo $_COOKIE['password_cookie']; ?>" required onkeyup="counter()" oninvalid="setCustomValidity('Please Entre Password');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#009EFF solid 2px';this.nextElementSibling.style.color = '#0008C1'"/>
            <label class="form-label" for="loginPassword" id="PasswordLabel">Password</label>
            <span class="input-group-append" id="icon1">
                <i class="fa-regular fa-eye p-2" style="color: #009EFF;" onclick="displayPassword()"></i>
            </span>
            <span class="input-group-append" id="icon2">
                <i class="fa-regular fa-eye-slash p-2" style="color: #009EFF;" onclick="hidePassword()"></i>
            </span>
          </div>
              <!-- Checkbox -->
              <div class="my-3 d-flex justify-content-between">
                <div class="form-check form-switch ms-4">
                <input id="flexSwitchCheckDefault" class="form-check-input" type="checkbox" value=""/>
                <label class="form-check-label text-dark" for="loginCheck">Remember me</label></div>
                <button style="color: #0008C1;" class="btn me-4 bg-transparent p-0" onclick="passReset()">Forgot password?</button>
              </div>
        <button style="background-color: #009EFF;" type="submit" name="signin" class="btn w-100 mb-4 rounded-pill text-white" id="signin">Sign in</button>
        <a href="../index.php" title="out" class="btn btn-outline-danger w-100 rounded-pill"><i class="fa fa-hand-o-left" aria-hidden="true"></i></a>
    `
}
function registerF(){
    document.getElementById("buttonR").style.backgroundColor = "#0008C1",
    document.getElementById("buttonS").style.backgroundColor = "#009EFF",
    document.getElementById("formbody").innerHTML = `
    <div class="form-outline mb-4">
        <input type="text" id="loginName" name="username" class="rounded-pill w-100" placeholder=" " required onkeydown="forceLower(this)" onkeyup="forceLower(this)" oninvalid="setCustomValidity('Please Entre UserName');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red';" oninput="setCustomValidity('');this.style.border = '#009EFF solid 2px';this.nextElementSibling.style.color = '#0008C1'"/>
        <label class="form-label" for="loginName">UserName</label>
    </div>
    <div class="form-outline mb-4">
        <input type="email" id="loginEmail" name="email" class="rounded-pill w-100" value = "<?php if(isset($_COOKIE['email_cookie'])) echo $_COOKIE['email_cookie']; ?>" placeholder=" " required oninvalid="setCustomValidity('Please Entre A Valid Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red';" oninput="setCustomValidity('');this.style.border = '#009EFF solid 2px';this.nextElementSibling.style.color = '#0008C1'"/>
        <label class="form-label" for="loginName">Email</label>
    </div>
    <div class="row mb-4">
    
   
    <div class="form-outline col-6 ">
        <input type="password" id="FPassword" name="password" class="rounded-pill w-100 " placeholder=" " required oninvalid="setCustomValidity('Please Entre Password');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red';" oninput="setCustomValidity('');this.style.border = '#009EFF solid 2px';this.nextElementSibling.style.color = '#0008C1'"/>
        <label class="form-label" for="Password">Password</label>
    </div>
    <div class="form-outline col-6">
        <input type="password" id="RPassword" name="rpassword" class="rounded-pill w-100" placeholder=" " required onkeyup="rpass(this)" onkeydown="rpass(this)" oninvalid="setCustomValidity('The Passwords Are Not Identical');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'"/>
        <label class="form-label" for="Password" id="PasswordLabel">Repeat Password</label>
    </div>
    </div>
    <button style="background-color: #009EFF;" type="submit" id="signin" name="register" class="btn w-100 mb-4 rounded-pill text-white">Register</button>
    <a href="../index.php" title="out" class="btn btn-outline-danger w-100 rounded-pill"><i class="fa fa-hand-o-left" aria-hidden="true"></i></a>
    `
}
function counter(){
    $value = document.getElementById("loginPassword").value;
    if($value.length != 0){
        document.getElementById("PasswordLabel").innerText = "Password("+ $value.length +")"
    }else{
        document.getElementById("PasswordLabel").innerText = "Password"; 
    } 
}
function passReset(){
    document.getElementById("formbody").innerHTML = `
    <div class="form-outline mb-4">
        <input type="email" id="loginEmail" class="rounded-pill w-100" placeholder=" " required oninvalid="setCustomValidity('Please Entre A Valid Email');this.style.border = 'red solid 2px';this.nextElementSibling.style.color = 'red'" oninput="setCustomValidity('');this.style.border = '#009EFF solid 2px';this.nextElementSibling.style.color = '#0008C1'"/>
        <label class="form-label" for="loginName">Email To Reset Password</label>
    </div>
    <button style="background-color: #009EFF;" type="submit" id="signin" name="passres" class="btn w-100 mb-4 rounded-pill text-white">Reset Password</button>

`
}
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
setTimeout(hidealertmsg, 5000);
async function hidealertmsg(){
    for(let i=0; i < 10; i++){
    document.getElementById("alert").style.opacity = 1-(i*0.1);
    await sleep(100);    
}
    document.getElementById("alert").style.display = 'none';
}
function forceLower(strInput) {
    strInput.value=strInput.value.toLowerCase();
    strInput.value=strInput.value.replace(/[_^$@#?]/g, charactersToReplace => ({'^': '', '_': '', '$' : '','@': '', '#': '', '?' : '' })[charactersToReplace]);
    strInput.value=strInput.value.replace(/\s+/g,' ');
}
function rpass(inp){
    if(inp.value == document.getElementById("FPassword").value){
    inp.setCustomValidity('');
    inp.style.border = '#009EFF solid 2px';
    inp.nextElementSibling.style.color = '#0008C1';
    }else{
        inp.style.border = 'red solid 2px';
        inp.nextElementSibling.style.color = 'red';
        inp.setCustomValidity('The Passwords Are Not Identical');
    }
}
</script>
</html>