<?php
include '../modal/usersModal.php';
include '../modal/trainesModal.php';
session_start();
//getAll users
$user = new UsersModal();
$resultUser=$user->getUsers();

$train = new TrainesModal();
$resultTrain = $train->getTraines();
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
                    <h1 class="h3 mb-0 text-gray-800">Traines</h1>
                   
                </div>
                <!-- alert -->
                <?php if (isset($_SESSION['add-train'])) {?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php 
                  echo $_SESSION['add-train'];
               
                unset($_SESSION['add-train']);
                 ?>
                <button type="button" class="btn-close rounded bg-success float-right" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></button>
              </div>
           <?php }?>
                <!-- Content Row -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                          <div> <h6 class="mt-1 font-weight-bold text-primary">Traines</h6></div> 
                            <div class=''>
                                <button type="button" class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#addTrain" id="add-train">
                                  <span>Add &nbsp;<i class="fa fa-train"></i></span> 
                                </button>
                              </div>
                        </div>
                        <div class="card-body">
                        
                            <div class="table-responsive">
                            <table id="table-traines" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">cap_train</th>
            <th scope="col">Vitesse</th>
            <th scope="col">Etat</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
       
          foreach ($resultTrain as $train) {
          ?>

            <tr>
              <th scope="row"><?php echo $train['id']; ?></th>
              <td id='td-1'><?php echo $train['nom']; ?></td>
              <td id='td-2'><?php echo $train['capacite_train']; ?></td>
              <td id='td-4'><span id="td-4-1"><?php echo $train['vitesse'].'</span>'. ' <span style=" color: crimson;">km/h</span>'; ?></td>
              <td id='td-5'><?php if ($train['etat']==1) echo ' <span  style=" color: green;">dispo</span>';
                  else echo '<span   style=" color: red;">non-dispo</span>' ?></td>
              <td>

                <button data-bs-toggle="modal" data-bs-target="#addTrain" onclick="edit(<?php echo $train['id']; ?>)"  class="btn btn-warning"  id="<?php echo $train['id']; ?>"><i class="fa fa-edit"></i></button>
                
                <a href="../controller/deleteTrain.php?id=<?php echo $train['id']; ?>" onclick="return confirm('Are you sure you want to delete this train?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>


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
<div class="modal fade" id="addTrain" tabindex="-1" role="dialog" aria-labelledby="addTrain" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title-train">Add train</h5>
        <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
    <form method="POST" action="../controller/trainesAdd.php" id="form-train">
    <div class="modal-body">

<div class="row">
  <div class="mb-3 col-12">
    <input type="hidden" class="form-control" readonly id="train-id" value="" name="id">
  </div>

  <div class="mb-1 col-md-12">
    <label class="form-label">nom</label>
    <input type="text" class="form-control verify-form" id="nom-train" name="nom-train" autocomplete="off" placeholder="Exemple:train" required />
  </div>

  <div class="mb-1 col-md-12"> 
  <label class="form-label">cap-train</label>
  <div>
  <select class="form-control verify-form" id="train-capacite" name="train-capacite" >
    <option value="" selected>Please select</option>
    <option id="" value="100" >100 personne</option>
    <option id="" value="200" >200 personne</option>
    <option id="" value="300" >300 personne</option>
    <option id="" value="400" >400 personne</option>
  </select>
  </div>
</div>




<div class="mb-1 col-md-12"> 
  <label class="form-label">vitesse</label>
  <div>
  <select class="form-control verify-form" id="train-vitesse" name="train-vitesse" >
    <option value="" selected>Please select</option>
    <option id="" value="100" >100 km/h</option>
    <option id="" value="150" >150 km/h</option>
    <option id="" value="200" >200 km/h</option>
    <option id="" value="250" >250 km/h</option>
    <option id="" value="300" >300 km/h</option>
  </select>
  </div>
</div>

<div class="mb-2 col-12">
 <label for=""></label>
  <div>
  <select class="form-control " id="train-etat" name="train-etat" >
    <option value="" selected>Please select</option>
    <option id="" value="1" >disponible</option>
    <option id="" value="0" >non disponible</option>
  </select>
  </div>
</div>

<div class="mb-3  col-12 rounded-pill" id="error-gare">
  <p></p>
</div>
 

</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button  type="submit" name="update" class="btn btn-warning" id="train-update-btn">Update</button>
<button type="submit" name="save" class="btn btn-primary train-action-btn" id="train-save-btn">Save</button>
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
      $("#train-save-btn").css("display", "none");
      $("#train-update-btn").css("display", "block");
      $("#train-etat").css("display", "block");
      // change action
      $('#form-train').attr('action', '../controller/updateTrain.php');
    

      console.log('hi'+id);
      $('#train-id').val(id);
      // let a=$('#'+'+id+');
      // console.log( $('#'+id).parent().parent().children('#td-4').children('#td-4-1').html());
       $('#nom-train').val($('#'+id).parent().parent().children('#td-1').html());
       let select_train_capacite = $('#'+id).parent().parent().children('#td-2').html();
       $('#train-capacite').val(select_train_capacite).change();
      //  let select_cap_second = $('#'+id).parent().parent().children('#td-3').html();
      //  $('#train-cap-second').val(select_cap_second).change();
       let train_vitesse = $('#'+id).parent().parent().children('#td-4').children('#td-4-1').html();
       $('#train-vitesse').val(train_vitesse).change();
       let etat_train = $('#'+id).parent().parent().children('#td-5').text();
       if(etat_train == 'non-dispo') {
        $('#train-etat').val(0).change();
       } else{
        $('#train-etat').val(1).change();
       }

             }
    //btn of save
 $("#add-train").click(function(){
      $("#train-save-btn").css("display", "block");
      $("#train-update-btn").css("display", "none");
      $("#train-etat").css("display", "none");
      $("#form-train")[0].reset(); //Syntax to convert jQuery element to a JavaScript object.

 });

    // $(document).ready(function() {
    
   //data table
    $('#table-traines').DataTable();
    
    $('#train-save-btn').prop('disabled', true);
    $('#train-update-btn').prop('disabled', true);
    $('.verify-form').on('keyup keypress blur change', function(e) {

      let nom_train = $('#nom-train').val();
      let train_cap = $('#train-capacite').val();
      let vitesse_train = $('#train-vitesse').val();
  
    if((nom_train!='')&&(train_cap!='')&&(vitesse_train)!=''){
     $('#train-save-btn').prop('disabled', false);
     $('#train-update-btn').prop('disabled', false);
    }else{
      $('#train-save-btn').prop('disabled', true);
      $('#train-update-btn').prop('disabled', true);
    }
});
   
</script>
</html>