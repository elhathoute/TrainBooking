<?php
include '../modal/voyagesModal.php';
include '../modal/reservationsModal.php';
session_start();
//voyages
$voyage = new VoyagesModal();
$resultVoyage = $voyage->getVoyages();
//reservations
$reservation = new ResevationModal();
$resultReservation =$reservation->getReservation();
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
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

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
                    <h1 class="h3 mb-0 text-gray-800">Reservations</h1>
                   
                </div>
                <!-- alert -->
  <!-- alert -->
  <?php if (isset($_SESSION['add-reservation'])) {?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php 
                  echo $_SESSION['add-reservation'];
               
                unset($_SESSION['add-reservation']);
                 ?>
                <button type="button" class="btn-close rounded bg-success float-right" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></button>
              </div>
           <?php }?>             
                <!-- Content Row -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                          <div> <h6 class="mt-1 font-weight-bold text-primary">Reservations</h6></div> 
                            <div class=''>
                                <button type="button" class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#addReservation" id="add-reservation">
                                  <span>Add &nbsp;<i class="fa fa-dollar"></i></span> 
                                </button>
                              </div>
                        </div>
                        <div class="card-body">
                        
                            <div class="table-responsive">
                            <table id="table-reservations" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">date_reservation</th>
            <th scope="col">user</th>
            <th scope="col">voyage</th>
            <th scope="col">etat</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach($resultReservation as $reservation) {?>
        <tr>
              <th scope="row"><?php echo $reservation['id']; ?></th>
              <td id='td-1'><?php echo $reservation['date_reserve']; ?></td>
              <td id='td-2'><?php echo $reservation['id_user']; ?></td>
              <td id='td-3'><?php echo $reservation['id_voyage']; ?></td>
              <td id='td-4'><?php  if($reservation['etat']==1){
             echo '<span class="badge badge-success td-4-1">Confirmer</span>';
              }else{
                echo '<span class="badge badge-warning td-4-1">Annuler</span>';
              } ?></td>
              
              <td>
              <button data-bs-toggle="modal" data-bs-target="#addReservation" onclick="edit(<?php echo $reservation['id']; ?>)"  class="btn btn-warning"  id="<?php echo $reservation['id']; ?>"><i class="fa fa-edit"></i></button>
             
             <a  href="../controller/deleteReservation.php?id=<?php echo $reservation['id']; ?>" onclick="return confirm('Are you sure you want to delete this reservatio?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>

              </td>
        </tr>      
      <?php } ?>
     
  
        </tbody>
       
       </table>
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
   
   <!-- Modal -->
   <div class="modal fade" id="addReservation" tabindex="-1" role="dialog" aria-labelledby="addGare" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="staticBackdropLabel">Add reservation</h5>
           <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
         </div>
       <form method="POST" action="../controller/ReservationAdd.php" id="form-reservation">
       <div class="modal-body">
   
   <div class="row">
     <div class="mb-3 col-12">
       <input type="hidden" class="form-control" readonly id="reservation-id" value="" name="id">
     </div>
   
     <div class="mb-1 col-md-12">
       <label class="form-label">reservation-date</label>
       <input type="datetime-local" class="form-control verify-form" id="reservation-date" name="reservation-date" autocomplete="off" required />
     </div>
   
   
     <div class="mb-1 col-md-12">
       <label class="form-label">reservation-user</label>
       <input type="text" class="form-control verify-form" value="1" id="reservation-user" name="reservation-user" autocomplete="off" readonly required />
     </div>

   
     <div class="mb-1 col-md-12"> 
     <label class="form-label">reservation_voyage</label>
     <div>
     <select class="form-control verify-form" id="reservation-voyage" name="reservation-voyage" >
       <option value="" selected>Please select</option>
       <?php
       
       foreach ($resultVoyage  as $voyage) {
       ?>
       <option id="" value="<?php echo $voyage['id']; ?>" ><?php echo $voyage['id']; ?></option>
      <?php } ?>
     </select>
     </div>
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
     <label class="form-label">reservation_etat</label>
     <div>
     <select class="form-control verify-form" id="reservation-etat" name="reservation-etat" >
       <option value="" selected>Please select</option>
       <option id="" value="1" >confirmer</option>
       <option id="reservation-etat-2" value="2"  >annuler</option>

     </select>
     </div>
   </div>


   </div>
   </div>
   <div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   <button  type="submit" name="update" class="btn btn-warning" id="reservation-update-btn">Update</button>
   <button type="submit" name="save" class="btn btn-primary reservation-action-btn" id="reservation-save-btn">Save</button>
   </div>
    </form>
       </div>
     </div>
   </div>
   <!-- End of Page Wrapper -->
   </body>
   
   
   
   
   
   
   
   
   
   
   <script src="../vendor/jquery/jquery.min.js"></script>
       <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   
       <!-- Core plugin JavaScript-->
       <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
   
       <!-- Custom scripts for all pages-->
       <script src="../js/sb-admin-2.min.js"></script>
   
       <!-- Page level plugins -->
       <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
       <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
   
       <!-- Page level custom scripts -->
       <script src="../js/demo/datatables-demo.js"></script>
   <script >
 
       //btn of edit
       function edit(id){
         $("#reservation-save-btn").css("display", "none");
         $("#reservation-update-btn").css("display", "block");
   
    //      // change action
           $('#form-reservation').attr('action', '../controller/updateReservation.php');
           $('#reservation-id').val(id);
           $('#reservation-date').val($('#'+id).parent().parent().children('#td-1').html());
           $('#reservation-user').val($('#'+id).parent().parent().children('#td-2').html());
           $('#reservation-voyage').val($('#'+id).parent().parent().children('#td-3').html());
           let reservation_etat =$('#'+id).parent().parent().children('#td-4').children('.td-4-1').html();
           (reservation_etat=='Confirmer')?($('#reservation-etat').val(1).change()):($('#reservation-etat').val(2).change());
          
        
       }
    
    //    //btn of save
    $("#add-reservation").click(function(){
         $("#reservation-save-btn").css("display", "block");
         $("#reservation-update-btn").css("display", "none");
         $("#form-reservation")[0].reset(); //Syntax to convert jQuery element to a JavaScript object.    
    });
   
    //    // $(document).ready(function() {
       
    //   //data table
       $('#table-reservations').DataTable();
  
   
    $('#reservation-save-btn').prop('disabled', true);
    $('#reservation-update-btn').prop('disabled', true);
    $('.verify-form').on('keyup keypress blur change', function(e) {

      let reservation_date = $('#reservation-date').val();
      let reservation_user= $('#reservation-user').val();
      let reservation_voyage = $('#reservation-voyage').val();
      let reservation_etat= $('#reservation-etat').val();
      let today = new Date().getTime();
      // console.log(today);
      // console.log(new Date(reservation_date).getTime());
    if((reservation_date!='')&&(reservation_user!='')&&(reservation_voyage!='')&&(reservation_etat!='')&&((new Date(reservation_date).getTime())>=(today))){
     $('#reservation-save-btn').prop('disabled', false);
     $('#reservation-update-btn').prop('disabled', false);
    }else{
      $('#reservation-save-btn').prop('disabled', true);
      $('#reservation-update-btn').prop('disabled', true);
    }
});
   
//    });
   </script>
   </html>