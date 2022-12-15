<?php
include '../modal/usersModal.php';
//getAll users
$user = new UsersModal();
$resultUser=$user->getUsers();


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
                    <h1 class="h3 mb-0 text-gray-800">Users</h1>
                   
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div><h6 class="mt-1 font-weight-bold text-primary">Users</h6></div>
                            <div class=''>
                                <button type="button" class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#addTrain">
                                  <span>Add &nbsp;<i class="fa fa-user"></i></span> 
                                </button></div>
                        </div>
                        <div class="card-body">
                      
                            <div class="table-responsive">
                            <table id="table-users" class="table table-striped" style="width:100%">
        <thead>
            <tr>
               
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
                </tr>
            </tr>
        </thead>
        <tbody>
        <?php 
     
     foreach($resultUser as $users) {
    ?>
      
   <tr>
     <th scope="row"><?php echo $users['id']; ?></th>
     <td><?php echo $users['nom']; ?></td>
     <td><?php echo $users['email']; ?></td>
     <td>
       <?php 
        if($users['id_role']==1) echo 'Admin';
        else 
        echo 'Passenger';
        ?>
   </td>
     <td >
     <?php
        $count= $user->getCounAdmin($_SESSION['user']['id_role']);
        //  if( count($count) >=1 ){
 ?>
       <a data-countAdmin="<?php echo count($count);?>"   href="../controller/changerRole.php?role=<?php echo $users['id_role'];?>&id=<?php echo $users['id'];?>" class="btn btn-<?php
        if ($users['id_role'] == 1) {?><?php echo 'success';
          ?>" id="changer-role"
          <?php
        } 
      
        else {
            echo 'primary';
          } ?>"><i class="fa fa-<?php
        if ($users['id_role'] == 1)
           echo 'lock';
       else
           echo 'user';?>"></i></a>
           <?php } ?>

   </td>

   </tr>
<?php /*}*/?>
  
     
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
<div class="modal fade" id="addTrain" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTrain" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add user</h5>
        <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
    <form method="GET" action="../controller/usersAdd.php">
      <div class="modal-body">

      <div class="mb-3">
    <label for="nom-user" class="form-label">nom </label>
    <input type="text" class="form-control" id="nom-user" name="nom-user" >
  </div>
  <div class="mb-3">
    <label for="email-user" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email-user" name="email-user" >
  </div>
 </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">save</button>
      </div>
 </form>
    </div>
  </div>
</div>
<!-- End of Page Wrapper -->
</body>
<script>
let role= document.getElementById('changer-role').getAttribute('data-countadmin');
if(role==1){
  console.log('ok')
  document.getElementById('changer-role').classList.add('disabled');
}else{
  console.log('non-ok')
  document.getElementById('changer-role').classList.remove('disabled');
}
</script>









  <!-- Bootstrap core JavaScript-->
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
    $(document).ready(function() {
    // console.log('hi');
    $('#table-users').DataTable();
});
</script>
</html>