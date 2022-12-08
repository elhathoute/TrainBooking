
<?php
include '../modal/garesModal.php';
include '../modal/villesModal.php';

session_start();

$gare = new GaresModal;
$resultGare = $gare->getGares();

$ville = new VillesModal();
$resultVille = $ville->getVilles();
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
                    <h1 class="h3 mb-0 text-gray-800">Gares</h1>
                   
                </div>
                <!-- alert -->
  <!-- alert -->
  <?php if (isset($_SESSION['add-gare'])) {?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php 
                  echo $_SESSION['add-gare'];
               
                unset($_SESSION['add-gare']);
                 ?>
                <button type="button" class="btn-close rounded bg-success float-right" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></button>
              </div>
           <?php }?>             
                <!-- Content Row -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                          <div> <h6 class="mt-1 font-weight-bold text-primary">Gares</h6></div> 
                            <div class=''>
                                <button type="button" class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#addGare" id="add-gare">
                                  <span>Add &nbsp;<i class="fa fa-train"></i></span> 
                                </button>
                              </div>
                        </div>
                        <div class="card-body">
                        
                            <div class="table-responsive">
                            <table id="table-gares" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">ville</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
       
       foreach ($resultGare as $gare) {
       ?>

         <tr>
           <th scope="row"><?php echo $gare['id']; ?></th>
           <td id='td-1'><?php echo $gare['nom']; ?></td>
           <td id='td-2'><input id='td-2-2' type="hidden" value="<?php echo $gare['id-ville']; ?>"><p><?php echo $gare['ville']; ?></p> </td>
           <td>

             <button data-bs-toggle="modal" data-bs-target="#addGare" onclick="edit(<?php echo $gare['id']; ?>)"  class="btn btn-warning"  id="<?php echo $gare['id']; ?>"><i class="fa fa-edit"></i></button>
             
             <a href="../controller/deleteGare.php?id=<?php echo $gare['id']; ?>" onclick="return confirm('Are you sure you want to delete this gare?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>


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
   <div class="modal fade" id="addGare" tabindex="-1" role="dialog" aria-labelledby="addGare" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="staticBackdropLabel">Add train</h5>
           <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
         </div>
       <form method="POST" action="../controller/garesAdd.php" id="form-gare">
       <div class="modal-body">
   
   <div class="row">
     <div class="mb-3 col-12">
       <input type="hidden" class="form-control" readonly id="gare-id" value="" name="id">
     </div>
   
     <div class="mb-1 col-md-6">
       <label class="form-label">nom</label>
       <input type="text" class="form-control " id="nom-gare" name="nom-gare" autocomplete="off" placeholder="Exemple:gare" required />
     </div>
   
     <div class="mb-1 col-md-6"> 
     <label class="form-label">ville</label>
     <div>
     <select class="form-control " id="gare-ville" name="gare-ville" >
       <option value="" selected>Please select</option>
       <?php
       
       foreach ($resultVille as $ville) {
       ?>
       <option id="" value="<?php echo $ville['id']; ?>" ><?php echo $ville['nom']; ?></option>
      <?php } ?>
     </select>
     </div>
   </div>
   

    
   
   </div>
   </div>
   <div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   <button  type="submit" name="update" class="btn btn-warning" id="gare-update-btn">Update</button>
   <button type="submit" name="save" class="btn btn-primary gare-action-btn" id="gare-save-btn">Save</button>
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
         $("#gare-save-btn").css("display", "none");
         $("#gare-update-btn").css("display", "block");
   
    //      // change action
         $('#form-gare').attr('action', '../controller/updateGare.php');
         $('#gare-id').val(id);
          $('#nom-gare').val($('#'+id).parent().parent().children('#td-1').html());
          let ville = $('#'+id).parent().parent().children('#td-2').children('#td-2-2').val();
        
          $('#gare-ville').val(ville).change();
       }
    //    //btn of save
    $("#add-gare").click(function(){
         $("#gare-save-btn").css("display", "block");
         $("#gare-update-btn").css("display", "none");
         $("#form-gare")[0].reset(); //Syntax to convert jQuery element to a JavaScript object.
   
    });
   
       // $(document).ready(function() {
       
      //data table
       $('#table-gares').DataTable();
      //verification inputs
          $('#nom-gare').keyup(function(){
         let nom_gare = $(this).val();
        
      ((nom_gare !='')) ?  $(this).removeClass('is-invalid').addClass('is-valid') : $(this).removeClass('is-valid').addClass('is-invalid') ;
       
       });
   
   
   
//    });
   </script>
   </html>