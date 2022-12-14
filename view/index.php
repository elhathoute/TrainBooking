<?php
include_once '../modal/usersModal.php';
include_once '../modal/trainesModal.php';
include_once '../modal/garesModal.php';
include_once '../modal/voyagesModal.php';
include_once '../modal/reservationsModal.php';

$user = new UsersModal();
$countUser = count($user->getUsers());

$train = new TrainesModal();
$countTrain = count($train->getTraines());

$gare = new GaresModal();
$countGare = count($gare->getGares());

$voyage = new VoyagesModal();
$countVoyage = count($voyage->getVoyages());

$reservation=new ResevationModal();
$countReservation = count($reservation->getReservation());

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin-Dashboard</title>

    <!-- Custom fonts for this template-->
     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>

<!-- Page Wrapper -->
<div id="wrapper">
<?php include('sidebar.php'); ?>
<div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                   
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!--users -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Users</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$countUser?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- traines -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                             Traines</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$countTrain?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-train"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                         <!-- gares -->
                         <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                             Gares</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$countGare?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-train"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- voyages -->
                     <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                             Voyages</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$countVoyage?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-car"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <!-- reservations -->
                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                             Reservation</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$countReservation?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-dollar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

          
                </div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
    <?php include('footer.php')?>
        <!-- End of Footer -->

    </div>

</div>
    
</body>
<!-- End of Page Wrapper -->
</body>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

</html>