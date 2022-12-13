<?php
include 'modal/voyagesModal.php';
include 'modal/garesModal.php';


session_start();

    
  if((!empty($_GET['gare-depart']))&&(!empty($_GET['gare-arr']))){

    $gare_dept = $_GET['gare-depart'];  //id
    $gare_arr = $_GET['gare-arr'];      //id

    $gare1 = new GaresModal();
    $gareId1 = $gare1->searchby('gares', 'nom', $gare_dept);

    $gare2 = new GaresModal();
    $gareId2 = $gare2->searchby('gares', 'nom', $gare_arr);
  
    if(($gareId1!=NULL && $gareId2 != NULL)){
        $searchVoyage = new VoyagesModal();
        $resultSearchVoyage =$searchVoyage->searchvoyage($gareId1['id'],$gareId2['id']);
       
    }
    else if(($gareId1==NULL || $gareId2 == NULL)){
        $searchVoyage = new VoyagesModal();
        $resultSearchVoyage =$searchVoyage->searchvoyage();
   
   }
       
        
    }
    
  else{

    $searchVoyage = new VoyagesModal();
    $resultSearchVoyage =$searchVoyage->searchvoyage();
   
  }
 



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Résultats de votre recherche disponibiltés des Trains</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./result.css" />
</head>

<body style="background-color: rgb(242, 244, 247)">
    <nav class="navbar navbar-expand-lg" style="background-color: rgb(17, 31, 77)">
        <div class="container-fluid">
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="d-flex justify-content-center">
                    <a class="navbar-brand text-white" href="#" style="margin-left: 30px;"><span class="fw-bold fs-4">Your</span> <span class="fs-5">Train</span> <span class="fs-4">™</span></a>
                </div>

                <div class="">
                    <div class="" id="">
                        <div class="" id="navbarSupportedContent">

                            <ul class="navbar-nav d-flex flex-row justify-content-evenly ">
                                <li class=" nav-item dropdown me-3 pe-2">
                                    <a class="nav-link dropdown-toggle text-white" href="# " role="button " data-bs-toggle="dropdown" aria-expanded="false ">
                                        <span class="material-symbols-outlined text-white"> account_circle </span>
                                    </a>
                                    <ul class="dropdown-menu ">
                                        <li><a class="dropdown-item mt-2 " href="# ">Mon Profil</a></li>
                                        <li><a class="dropdown-item mt-2 " href="# ">Mes réservations</a></li>
                                        <li><a class="dropdown-item my-2 " href="# ">Se déconnecter</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item me-5">
                                    <a class="nav-link " href="# "><span class="material-symbols-outlined text-white ">shopping_cart</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </nav>

    <section>
        <div class="container mt-5 mb-2 ">
            <div class="row ">
                <h4 class="text-center ">GARE DE DEPART <span class="mx-3 fw-bold fs-3 mb-1 " style="color: rgb(228, 58, 25) ">></span>GARE DE DESTINATION</h4>
                <p class="text-center ">Deuxième Classe</p>
                <div class="text-center mb-5 ">
                 <a href="index.php">
                 <button type="button " class="btn btn-outline-dark text-center " style="width: 300px ">
              <span class="material-symbols-outlined text-center fs-5 me-2 ">search </span>
              <span class="text-center ">Mon nouveau trajet</span>
            </button>
                 </a>
                </div>
            </div>
        </div>
        <div class="container col-sm-11 col-md-8 col-lg-7 ">
            <div>
                <h4 class="text-center text-white bg-info rounded-4 my-4 py-3">Les Voyages Disponibles</h4>
            </div>
            <div class="row ">
            <?php

                foreach($resultSearchVoyage as $vo){
                
                    echo '
                    <div class="card rounded-4 mb-1">
                    <div class="card-header bg-white d-flex justify-content-between mt-2 mx-3 ">
                        <div class="text-center ">
                            <p class="fw-semibold ">Départ</p>
                           <p > <span class="badge rounded-pill bg-secondary"><i class="fa fa-clock"> </i>  '.$vo['date_dep'].'</span></p>
                           
                            <span class="badge rounded-pill bg-primary shadow"><i class="fa fa-train"> </i>  '.$vo['gare-nom1'].'</span>
                        </div>
                        <div class="text-center mt-3 ">
                            <p class="fw-semibold "><span class="badge rounded-1 bg-warning">  Durée '.$searchVoyage->secsToStr($vo['date_dep'],$vo['date_arr']).'</span></p>
                            <hr style="color: rgb(228, 58, 25) " />
                            <p class="fw-semibold ">Direct</p>
                        </div>
                        <div class="text-center ">
                            <p class="fw-semibold ">Arrivée</p>
                            <p> <span class="badge rounded-pill bg-secondary h-3"><i class="fa fa-clock"> </i>  '.$vo['date_arr'].'</span></p>
                            <span class="badge rounded-pill bg-success shadow"><i class="fa fa-train"> </i>  '.$vo['gare-nom2'].'</span>
                        </div>
                    </div>

                    <div class="card-body d-flex justify-content-between align-items-center ">
                        <div class="d-flex align-items-center ">
                            <div class="ps-2 ">
                                <i class="bx bx-train fs-1 " style="color: rgb(228, 58, 25) "></i>
                            </div>
                            <div class="px-3 text-center ">
                                <p class=" text-center pt-3 fs-5 ">'.$vo['train-nom'].' </p>
                              
                            </div>
                            <span class="badge bg-danger"><i class="fa fa-users"></i> '.$vo['cap_voyage'].' place</span>
                        </div>
                        <div class="px-4 text-center ">
                          
                            <p class="px-2 fw-semibold ">A partir de</p>
                            <p class="px-2 fw-semibold">'.$vo['prix_voyage'].' MAD</p>
         <button id="btnReserv" name="save" type="submit" class="btn btn-dark px-3"  
         onclick="showReservation('.$vo['id'].','.$vo['prix_voyage'].','.$vo['cap_voyage'].');"
         data-bs-toggle="modal" data-bs-target="#addReservation" id="add-reservation">Réserver</button>
                        </div>
                    </div>
                </div>
                    ';
                }
            

                ?>
               <?php if(count($resultSearchVoyage)==0){?>
                <div class="card rounded-4 ">
                    <div class="card-header bg-white d-flex justify-content-between mt-2 mx-3 ">
                     
                    </div>

                    <div class="card-body d-flex justify-content-between align-items-center ">
                        <div class="d-flex align-items-center ">
                        <img class="w-50" src="img/delete.jpg" alt="" srcset="">
                       <span class="alert alert-danger shadow"> Voyage Not Fount!</span>
                        </div>
                        
                        
                      
                    </div>
                </div>
              <?php }?>
            </div>
        </div>
    </section>

     <!-- Modal -->
   <div class="modal fade" id="addReservation" tabindex="-1" role="dialog" aria-labelledby="addGare" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="staticBackdropLabel">Add reservation</h5>
           <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
       <form method="POST" action="controller/Reserver-voyage.php" id="form-reservation">
       <div class="modal-body">
   
   <div class="row">
     <div class="mb-3 col-12">
       <input type="hidden" class="form-control" readonly id="reservation-id" value="" name="id">
     </div>
   
     <div class="mb-1 col-md-12">
       <input type="datetime-local" value="<?php
       $currentDate = new DateTime();
       echo $currentDate->format('Y-m-d H:i:s');
       ?>" class="form-control verify-form" readonly id="reservation-date" hidden name="reservation-date" autocomplete="off" required />
     </div>
   
   
     <div class="mb-1 col-md-12">
       <input type="text" class="form-control verify-form" value="1" id="reservation-user" hidden name="reservation-user" autocomplete="off" readonly required />
     </div>

   
     <div class="mb-1 col-md-12"> 
       <input type="text" class="form-control "  id="reservation-voyage" name="reservation-voyage" hidden autocomplete="off" readonly required />
 
   </div>

   <div class="mb-1 col-md-12"> 
       <input type="text" class="form-control "  id="reservation-prix" name="reservation-prix" hidden autocomplete="off" readonly required />
 
   </div>
   
   <div class="mb-1 col-md-12"> 
  <label class="form-label">cap-reservation</label>
  <div>
  <select class="form-control " id="reservation-capacite" name="reservation-capacite" >
    <option id="" value="1" selected >1 personne</option>
    <option id="" value="2" >2 personne</option>
    <option id="" value="3" >3 personne</option>
    <option id="" value="4" >4 personne</option>
    <option id="" value="5" >5 personne</option>
  </select>
  </div>
</div>
<div class="mb-1 col-md-12">
       <label class="form-label">reservation-total</label>
       <input type="text" class="form-control" min="0" id="reservation-total" name="reservation-total" autocomplete="off" readonly required />
     </div>
   <div class="mb-1 col-md-12"> 
     <label class="form-label">reservation_etat</label>
     <div>
     <select class="form-control verify-form" id="reservation-etat" name="reservation-etat" >
       <option value="" disabled >Please select</option>
       <option id="" value="1" selected>confirmer</option>
       <option id="reservation-etat-2" value="2" disabled >annuler</option>

     </select>
     </div>
   </div>


   </div>
   </div>
   <div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   <button type="submit" name="save" class="btn btn-primary reservation-action-btn" id="reservation-save-btn">Save</button>
   </div>
    </form>
       </div>
     </div>
   </div>

    <footer style="background-color: rgb(188, 206, 248);">
        <div class="container mt-5 pt-5">
            <div class="d-flex flex-nowrap justify-content-center">
                <a href="#" style="color: black;"><i id="bx1" class='bx bxl-facebook fs-1 mx-2'></i></a>
                <a href="#" style="color: black;"><i id="bx2" class='bx bxl-twitter fs-1 mx-2' ></i></a>
                <a href="#" style="color: black;"><i id="bx3" class='bx bxl-instagram fs-1 mx-2' ></i></a>
                <a href="#" style="color: black;"><i id="bx4" class='bx bxl-youtube fs-1 mx-2' ></i></a>
                <a href="#" style="color: black;"><i id="bx5" class='bx bxl-whatsapp fs-1 mx-2' ></i></a>
            </div>
            <div class="d-flex justify-content-center my-5 pb-4">
                <div class="mx-4 px-2 text-center">
                    <p class="fw-semibold fs-5">YourTrain™ Voyages</p>
                   <a href="#" class="text-decoration-none text-dark"> <p class="lien"> Réserver et planifier </p></a>
                   <a href="#" class="text-decoration-none text-dark"> <p class="lien"> Gérer la réservation </p></a>
                </div>
                <div class="mx-4 px-2 text-center">
                    <p class="fw-semibold fs-5">Sites du Groupe</p>
                    <a href="#" class="text-decoration-none text-dark"> <p class="lien"> YourTrain.ma </p></a>
                   <a href="#" class="text-decoration-none text-dark"> <p class="lien">MyBus.ma </p></a>
                </div>
            </div>
            <hr class="pb-5 text-center" id="line">
            <div class="text-center pb-2">
                <a href="#" class="text-decoration-none text-dark"><p class="lien" style="font-size: 13px;">Conditions générales de vente et d’utilisation du site</p></a>
            </div>
            <div class="pb-4 text-center" >
                <img src="../images/cartes.png" alt="">
            </div>
            <div class="text-center py-2">
                <p style="font-size: 10px;">© 2022 YourTrain™-Tous droits réservés</p>
            </div>

        </div>
    </footer>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4 " crossorigin="anonymous "></script>
<script>
    function showReservation(id_voyage,prix_voyage,cap_voyage){
        document.getElementById('reservation-voyage').value=id_voyage;
        document.getElementById('reservation-prix').value=prix_voyage;
        document.getElementById('reservation-total').value=prix_voyage*1+' DH';
        document.getElementById('reservation-capacite').addEventListener('change',function(){
            let personnes =document.getElementById('reservation-capacite').value;
            if(personnes<=cap_voyage){
                document.getElementById('reservation-save-btn').disabled=false;
                 
            }else{
              
            document.getElementById('reservation-save-btn').disabled=true;
            }
            document.getElementById('reservation-total').value=prix_voyage*personnes+' DH';
        });
         
      
    }
</script>
</html>