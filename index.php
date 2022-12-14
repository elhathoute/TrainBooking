<?php

include('modal/usersModal.php');

$commentaire = new UsersModal();
$commentaires = $commentaire->getCommentaires();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/headerstyle.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/result.css" />
    <title>Document</title>
</head>
<body style="background-color:#152242;">
<?php

include_once('view/navbar.php');

?>
<!-- hero section   -->
<div id="particles-js" class="position-relative">
  <div class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <h1 class="text-white text-center" style="font-size: 45px;">Voyager En Toute</h1>
    <div class="anima">Sécurité</div>
    <div class="anima">Rapidité</div>
    <div class="anima">Confort</div>
  </div>
</div>
  
<!-- <div class="d-flex flex-column align-items-center justify-content-center" >
<div class="mt-5 mb-5">
<h1 class="text-white " style="font-size: 45px;">Voyager En Toute</h1>
<div class="anima">Sécurité</div>
<div class="anima">Rapidité</div>
<div class="anima">Confort</div>
</div>
</div> -->

<!-- search section -->
<form action="result.php" method="GET" class="w-100 row p-5" style="background-color: #293659;">
    <div class="mb-3 p-2 col-12 d-flex flex-column align-items-center">
  <!-- <label for="exampleFormControlInput1" class="form-label text-white">Gare De Départ</label> -->
<input placeholder="gare-depart" name="gare-depart" type="text" class="form-control rounded-pill gared-garea" id="gared" autocomplete="off">
</div>
<!-- search -->
<div   id="suggesstion-gare"></div>
<div  id="suggesstion-gare-error"></div>
<!--  -->
<div class="col-12 d-flex flex-column align-items-center">
<button class="btn shadow-none bg-transparent" type="button" onclick="switchgare()">
  <img src="img/arrow.svg" style="height: 50px;width:auto">
</button>
</div>
<div class="mb-3 p-2 col-12 d-flex flex-column align-items-center">
  <!-- <label for="" class="form-label text-white">gare d'arrivé</label> -->
  <input type="text" placeholder="gare-arrivé" name="gare-arr" class="form-control rounded-pill gared-garea" id="garea" autocomplete="off">
</div>
<div   id="suggesstion-gare2"></div>
<div  id="suggesstion-gare-error2"></div>
<!--  -->
<div class="my-3  d-flex flex-column align-items-center">
<button type="submit" name="search" id="search-voyage" class="w-100 rounded-pill btn btn-primary">Search</button>
</div>
    </form>
<!-- reviews -->
<div class="d-flex flex-column align-items-center mt-5 p-5" >
  <h1 class="text-white">still not convinced !</h1>
  <h5 class="text-white">that's what people think about us</h5>
</div>
<div class="position-relative w-100 mb-5" >
<div class="container overflow-hidden" >
  <div id="translate" class="d-flex justify-content-start" style="transition-duration: 3s;">
  

   
    <?php foreach($commentaires as $comm) {?>
<div class="col-lg-4 col-md-6 col-12 p-2">
<div class="card">
    <div class="card-body">
      <div class="w-100 d-flex justify-content-center">
    <div class="card-img-top rounded-circle mb-3" style="min-height: 80px;max-height: 80px;min-width: 80px;max-width: 80px;background-image:url(https://picsum.photos/200);background-position: center;background-repeat: no-repeat;background-size: cover;"></div></div>
      <h4 class="card-title d-flex justify-content-center"><?php echo $comm['nom-user'];?></h4>
      <div class="d-flex justify-content-center">
      <svg style="display:none;">
        <defs>
          <symbol id="fivestars" >
            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="white" fill-rule="evenodd"/>
            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="white" fill-rule="evenodd" transform="translate(24)"/>
            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="white" fill-rule="evenodd" transform="translate(48)"/>
            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="white" fill-rule="evenodd" transform="translate(72)"/>
            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="white" fill-rule="evenodd"  transform="translate(96)"/>
          </symbol>
        </defs>
      </svg>
      <div class="rating">
        <progress class="rating-bg" value="3" max="5"></progress>
        <svg><use xlink:href="#fivestars"/></svg>
      </div>
    </div>
      <p class="card-text d-flex justify-content-center">
      <?php echo $comm['commentaire'];?>
      </p>
    </div>
  </div>
    </div>
    <?php }?>
  </div>
  
  </div>
    <button class="btn fs-1" id="pre" onclick="translatepre()">
    <i class="fa-solid fa-angle-left"></i>
    </button>
    <button class="btn fs-1" id="next" onclick="translatenext()">
    <i class="fa-solid fa-angle-right"></i>
    </button>
    
    </div>
  
<?php

include_once('view/footer.php');

?>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/16f6b89e3c.js" crossorigin="anonymous"></script>
<Script>
var va = document.getElementById('profile');
var signinform = document.getElementById('signinform');
  function showprofile(){
    va.classList.toggle("active");
  }
  function showsignin(){
    signinform.classList.toggle("active");
  }
    window.addEventListener("scroll", (event) => {
    // va.classList.remove("active");
    signinform.classList.remove("active");
    let scroll = this.scrollY;
    if(scroll!=0){
      document.getElementById('navbarst').style.backgroundColor = 'white';
      document.getElementById('profiletoggler').classList.remove('text-white');
      document.getElementById('profiletoggler').classList.add('text-dark');
      document.getElementById('logo').classList.remove('text-white');
      document.getElementById('logo').classList.add('text-dark');
    }else{
      document.getElementById('navbarst').style.backgroundColor = '#152242';
      document.getElementById('profiletoggler').classList.add('text-white');
      document.getElementById('profiletoggler').classList.remove('text-dark');
      document.getElementById('logo').classList.add('text-white');
      document.getElementById('logo').classList.remove('text-dark');
    }
});
    anima(0);
    function anima($j){
        if($j==3){
            $j=0;
        }
        var elements = document.getElementsByClassName("anima");
        for(let i=0;i<elements.length;i++){
            elements[i].classList.remove("active");
        }
        elements[$j].classList.add("active");
        $j++;
        setTimeout(() => {
            anima($j);
                }, 4000); 

    }
    var minise = 3;
var percent = 34;
window.onresize = function(){
  let size = window.innerWidth;
  var minise = 3;
var percent = 34;
  if(size >= 766 && size < 990){
    minise = 2;
    percent = 50;
  }
  else if(size < 766){
    minise = 1;
    percent = 100;
  }
}
window.onload = function(){
  let size = window.innerWidth;
  
  if(size >= 766 && size < 990){
    minise = 2;
    percent = 50;
  }
  else if(size < 766){
    minise = 1;
    percent = 100;
  }
}
    var ratings = document.getElementsByClassName('rating-bg').length;
    var translatecount = 0;
    function translatepre(){
      if(translatecount > 0){
      translatecount --;}
      if(translatecount < (ratings - minise)){
      document.getElementById('next').style.display = 'block';
      }
      if(translatecount == 0){
        document.getElementById('pre').style.display = 'none';
        
      }
      document.getElementById('translate').style.transform = "translate(calc(-"+percent+"% * "+Math.abs(translatecount)+"),0px)";
      
    }
    function translatenext(){
      if(translatecount < (ratings - minise)){
      translatecount++;}
      if(translatecount != 0){
        document.getElementById('pre').style.display = 'block';
      }
      if(translatecount == (ratings - minise)){
        document.getElementById('next').style.display = 'none';
        
      }
      document.getElementById('translate').style.transform = "translate(calc(-"+percent+"% * "+Math.abs(translatecount)+"),0px)";
      
    }
    function switchgare(){
      let text = document.getElementById('gared').value;
      document.getElementById('gared').value = document.getElementById('garea').value;
      document.getElementById('garea').value = text;

    }
    function switchtime(){
      let time = document.getElementById('tempsd').value;
      document.getElementById('tempsd').value = document.getElementById('tempsa').value;
      document.getElementById('tempsa').value = time;
    }
    

// console.log(document.getElementById("suggesstion-gare").getAttribute("data-gare"));
</Script>

<script src="js/particles.js"></script>
<script src="js/app.js"></script>
<script src="js/search.js"></script>