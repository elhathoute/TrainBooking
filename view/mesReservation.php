<?php
include_once '../modal/reservationsModal.php';
$id = $_GET['id'];
$reservation = new ResevationModal();
$resultatReservation= $reservation->getOneReservation($id);

$countReservation=count($resultatReservation);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="../css/headerstyle.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    include "./navbar.php";
    ?>
    <section>
        <div class="container mt-5 mb-2 ">
            <div class="row">
            <h4 class="fw-bold fs-3 mb-4"> Mes Réservations</h4>
            <hr class="mb-5">
            <div class="text-center mb-5 ">
            <a href="../index.php" class="btn btn-outline-dark text-center " style="width: 300px ">
                      <span class="text-center ">Retour à la page d'acceuil</span></a> 
                    
                </div>
            </div>
        </div>

<?php
if ($countReservation > 0) {
    foreach ($resultatReservation as $reservation) {
?>
        <div class="container col-sm-11 col-md-8 col-lg-6 mb-2 ">
            
            <div class="row ">
                <div class="card rounded-4 shadow" id="reservation">
                    <div class="card-header bg-white d-flex justify-content-between mt-2 mx-3 ">
                        <div class="text-center mt-4">
                            <p class="fw-bold"> Date Reservation</p>
                            <p class="fw-semibold "><i class="badge bg-warning"><?php echo $reservation['date_reserve']; ?></i></p>       
                        </div>
                        
                        <div class="text-center mt-3 me-4">
                            <p class="fw-bold ">M. <?php echo $reservation['user']; ?></p>
                        </div>
                    </div>

                    <div class="card-body d-flex justify-content-between align-items-center ">
                        <div class="d-flex align-items-center ">
                            <div class="ps-2 ">
                                <i class="bx bx-train fs-1 " style="color: rgb(228, 58, 25);"></i>
                            </div>
                            <div class="px-3 text-center ">
                                <p class="mt-2 text-center pt-3 fs-5">Voyage Numero:</p>
                                <p class="text-center fw-light "><i class="badge bg-success"><?php echo $reservation['id_voyage']; ?></i></p>
                            </div>
                            <div class="px-3 text-center ">
                                <p class="mt-2 text-center pt-3 fs-5">Personnes:</p>
                                <p class="text-center fw-light "><i class="badge bg-info"><?php echo $reservation['cap_reservation'].' Personnes'; ?></i></p>
                            </div>
                            <div class="px-3 text-center ">
                                <p class="mt-2 text-center pt-3 fs-5">Total:</p>
                                <p class="text-center fw-light "><i class="badge bg-secondary"><?php echo $reservation['prix']*$reservation['cap_reservation'].' DH'; ?></i></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="px-4 text-center ">
                                <form method="post" name="reservation" action="">
                                <a href="printPdf.php?id=<?php echo $reservation['id'];?>" id="btn-print"  class="btn btn-dark px-3">Imprimer</a>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
 }
}

else{
?>

                            <div class="container">
                            <div class="px-4 text-center ">
                            <img class="h-25" src="../img/delete.jpg" alt="">
                            <p class="text-danger">Reservation Not Found!</p>
                            </div>
                          
                        </div>

<?php
 }?>
    </section>
   
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/16f6b89e3c.js" crossorigin="anonymous"></script>

</html>