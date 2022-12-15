<?php
session_start();
?>


<nav class="navbar navbar-expand-lg fixed-top" style="background-color: gray;">




        <div class="container-fluid">
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="d-flex justify-content-center">
                    <a class="navbar-brand text-white" href="#" style="margin-left: 30px;"><span class="fw-bold fs-4">Your</span> <span class="fs-5">Train</span> <span class="fs-4">™</span></a>
                </div>
                <div class="">
                    <div class="" id="">
                        <div class="" id="navbarSupportedContent">

                    <?php
                    
                    if(isset($_COOKIE['email_cookie'])&&(isset($_SESSION['user']['id_role']))&&($_SESSION['user']['id_role']==2)){?>
                        <ul class="navbar-nav d-flex flex-row justify-content-evenly ">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="material-symbols-outlined text-white"> account_circle </span>

                                </a>
                                    <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item mt-2 " href="http://localhost/dashboard-version-3/view/profile.php">Mon Profil</a></li>
                                        <li><a class="dropdown-item mt-2 " href="http://localhost/dashboard-version-3/view/mesReservation.php?id=<?php echo $_SESSION['user']['id'];?>">Mes réservations</a></li>
                                        <li><a class="dropdown-item my-2 " href="http://localhost/dashboard-version-3/view/logoutPassenger.php">Se déconnecter</a></li>
                                    </ul>
                             </li>
                             <li class="nav-item me-5">
                             <a href="http://localhost/dashboard-version-3/view/mesReservation.php?id=<?php echo $_SESSION['user']['id'];?>" type="button" class="btn btn-light position-relative">
                                My
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php 
                                if(isset( $_COOKIE['count-reservation'])){
                                    echo $_COOKIE['count-reservation'];
                                } else {
                            echo 0;
                        }
                                ?>+
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                                </a> 
                                </li>            
                                <!-- <li class="nav-item me-5">
                                    <a class="nav-link " href="# "><span class="material-symbols-outlined text-white ">shopping_cart</span></a>
                                </li> -->
                            </ul>
                        <?php }else{ ?>
                            <div class="px-4 text-center ">        
                                <a href="http://localhost/dashboard-version-3/view/signin.php" id="login" name="login"  class="btn btn-dark rounded-3 px-3">Login</a>
                            </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
    </nav>
