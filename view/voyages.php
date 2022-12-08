<?php

include '../modal/trainesModal.php';
include '../modal/garesModal.php';
include '../modal/classesModal.php';
include '../modal/voyagesModal.php';
session_start();
//voyages
$voyage = new VoyagesModal;
$resultVoyage = $voyage->getVoyages();
//grt traines
$train = new TrainesModal();
$resultTrain = $train->getTraines();
//gare depart
$gare = new GaresModal;
$resultGare = $gare->getGares();
//gare d'arriver
$gare2 = new GaresModal;
$resultGare2 = $gare2->getGares();
//classes
$classe = new ClassesModal;
$resultClasse = $classe->getClasses();
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
                    <h1 class="h3 mb-0 text-gray-800">Voyages</h1>
                   
                </div>
                <!-- alert -->
  <!-- alert -->
  <?php if (isset($_SESSION['add-voyage'])) {?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php 
                  echo $_SESSION['add-voyage'];
               
                unset($_SESSION['add-voyage']);
                 ?>
                <button type="button" class="btn-close rounded bg-success float-right" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></button>
              </div>
           <?php }?>             
                <!-- Content Row -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                          <div> <h6 class="mt-1 font-weight-bold text-primary">Voyages</h6></div> 
                            <div class=''>
                                <button type="button" class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#addVoyage" id="add-voyage">
                                  <span>Add &nbsp;<i class="fa fa-car"></i></span> 
                                </button>
                              </div>
                        </div>
                        <div class="card-body">
                        
                            <div class="table-responsive">
                            <table id="table-gares" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">dat_dep</th>
            <th scope="col">dat_arriv</th>
            <th scope="col">train</th>
            <th scope="col">gare_dep</th>
            <th scope="col">gare_arr</th>
            <th scope="col">classe</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($resultVoyage as $voyage){
          ?>
        <tr>
              <th scope="row"><?php echo $voyage['id']; ?></th>
              <td id='td-1'><?php echo $voyage['date_dep']; ?></td>
              <td id='td-2'><?php echo $voyage['date_arr']; ?></td>
              <td id='td-3'><?php echo $voyage['id_train']; ?></td>
              <td id='td-4'><?php echo $voyage['id_gare_dep']; ?></td>
              <td id='td-5'><?php echo $voyage['id_gare_arr']; ?></td>
              <td id='td-6'><?php echo $voyage['id_classe']; ?></td>
              <td>
              <button data-bs-toggle="modal" data-bs-target="#addVoyage" onclick="edit(<?php echo $voyage['id']; ?>)"  class="btn btn-warning"  id="<?php echo $voyage['id']; ?>"><i class="fa fa-edit"></i></button>
             
             <a  href="../controller/deleteVoyage.php?id=<?php echo $voyage['id']; ?>" onclick="return confirm('Are you sure you want to delete this voyage?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>

              </td>
        </tr>      
     <?php }?>
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
   <div class="modal fade" id="addVoyage" tabindex="-1" role="dialog" aria-labelledby="addGare" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="staticBackdropLabel">Add train</h5>
           <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
         </div>
       <form method="POST" action="../controller/voyagesAdd.php" id="form-voyage">
       <div class="modal-body">
   
   <div class="row">
     <div class="mb-3 col-12">
       <input type="hidden" class="form-control" readonly id="voyage-id" value="" name="id">
     </div>
   
     <div class="mb-1 col-md-6">
       <label class="form-label">date-dep</label>
       <input type="date" class="form-control " id="voyage-date-dep" name="voyage-date-dep" autocomplete="off" placeholder="Exemple:gare" required />
     </div>
     <div class="mb-1 col-md-6">
       <label class="form-label">date-arr</label>
       <input type="date" class="form-control " id="voyage-date-arr" name="voyage-date-arr" autocomplete="off" placeholder="Exemple:gare" required />
     </div>
   
   
     <div class="mb-1 col-md-6"> 
     <label class="form-label">train</label>
     <div>
     <select class="form-control " id="voyage-train" name="voyage-train" >
       <option value="" selected>Please select</option>
       <?php
       
       foreach ($resultTrain  as $train) {
       ?>
       <option id="" value="<?php echo $train['id']; ?>" ><?php echo $train['nom']; ?></option>
      <?php } ?>
     </select>
     </div>
   </div>
   
   <div class="mb-1 col-md-6"> 
     <label class="form-label">gare-dep</label>
     <div>
     <select class="form-control " id="voyage-gare-dep" name="voyage-gare-dep" >
       <option value="" selected>Please select</option>
       <?php
       
       foreach ($resultGare as $gare) {
       ?>
       <option id="" value="<?php echo $gare['id']; ?>" ><?php echo $gare['nom']; ?></option>
      <?php } ?>
     </select>
     </div>
   </div>
    
   <div class="mb-1 col-md-6"> 
     <label class="form-label">gare-arr</label>
     <div>
     <select class="form-control " id="voyage-gare-arr" name="voyage-gare-arr" >
       <option value="" selected>Please select</option>
    
       <?php
       
       foreach ($resultGare2 as $gare2) {
       ?>
      <option id="" value="<?php echo $gare2['id']; ?>" ><?php echo $gare2['nom']; ?></option>
      <?php } ?>
     </select>
     </div>
   </div>

   <div class="mb-1 col-md-6"> 
     <label class="form-label">classe</label>
     <div>
     <select class="form-control " id="voyage-classe" name="voyage-classe" >
       <option value="" selected>Please select</option>
       <?php
       
       foreach ($resultClasse as $classe) {
       ?>
       <option id="prix-voyage"    value="<?php echo $classe['id']; ?>" ><?php echo $classe['nom']; ?></option>
  
      <?php } ?>
     </select>
     </div>
   </div>

  

   </div>
   </div>
   <div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   <button  type="submit" name="update" class="btn btn-warning" id="voyage-update-btn">Update</button>
   <button type="submit" name="save" class="btn btn-primary voyage-action-btn" id="voyage-save-btn">Save</button>
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
 
    //    //btn of edit
       function edit(id){
         $("#voyage-save-btn").css("display", "none");
         $("#voyage-update-btn").css("display", "block");
   
    //      // change action
         $('#form-voyage').attr('action', '../controller/updateVoyage.php');
         $('#voyage-id').val(id);
           $('#voyage-date-dep').val($('#'+id).parent().parent().children('#td-1').html());
           $('#voyage-date-arr').val($('#'+id).parent().parent().children('#td-2').html());

          
         
      
           let train=  $('#'+id).parent().parent().children('#td-3').html();
           $('#voyage-train').val(train).change();
           let gare_dep = $('#'+id).parent().parent().children('#td-4').html();
           $('#voyage-gare-dep').val(gare_dep).change();
           let gare_arr = $('#'+id).parent().parent().children('#td-5').html();
           $('#voyage-gare-arr').val(gare_arr).change();
           let classe = $('#'+id).parent().parent().children('#td-6').html();
           $('#voyage-classe').val(classe).change();
          // console.log($('#'+id).parent().parent().children('#td-1').html())
          // let ville = $('#'+id).parent().parent().children('#td-2').children('#td-2-2').val();
        
          // $('#gare-ville').val(ville).change();
       }
    // //    //btn of save
    $("#add-voyage").click(function(){
         $("#voyage-save-btn").css("display", "block");
         $("#voyage-update-btn").css("display", "none");
         $("#form-voyage")[0].reset(); //Syntax to convert jQuery element to a JavaScript object.
   
    });
   
    //    // $(document).ready(function() {
       
    //   //data table
    //    $('#table-gares').DataTable();
    //   //verification inputs
    //       $('#nom-gare').keyup(function(){
    //      let nom_gare = $(this).val();
        
    //   ((nom_gare !='')) ?  $(this).removeClass('is-invalid').addClass('is-valid') : $(this).removeClass('is-valid').addClass('is-invalid') ;
       
    //    });
   
   
   
//    });
   </script>
   </html>