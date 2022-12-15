<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruments</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- =============================================================== -->
    <!-- BEGIN FontAwesomme-->
    <!-- END style css-->

    <!-- =============================================================== -->
</style>
</head>
<body>
    <!-- BEGIN Profile -->
    <section class="py-5 ">
        <div class="container border border-bottom rounded-2 shadow">
            <div class="row align-items-center">
            <h1 class="col-12 text-center my-2">Your Profile</h1>
                <div class="col-md" style=" min-height: 550px;background-image:url(../img/profile.png);background-position: center;background-repeat: no-repeat;background-size: cover;">
                
              </div>
                <div class="col-md">
                  
                  <form class="mt-3 mx-md-4" method="POST" action="script.php" name="form-register" enctype="multipart/form-data" id="form-register" data-parsley-validate>
                    <div class="d-flex align-items-center mb-4">
                      <i class="fas fa-user me-3 mt-4"></i>
                      <div class="form-outline flex-fill">
                        <label class="form-label" for="form3Example1c">Your Name</label>
                        <input type="text" value="<?php echo $_SESSION['user']['nom'];?>" name="yourname" id="form3Example1c" class="form-control" data-parsley-trigger="keyup" data-parsley-length="[2, 30]" required/>
                      </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                      <i class="fas fa-envelope me-3 mt-4"></i>
                      <div class="form-outline flex-fill">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" value="<?php echo $_SESSION['user']['email'];?>" name="email" id="form3Example3c" class="form-control" data-parsley-trigger="keyup" data-parsley-pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,4}$" required/>
                      </div>
                    </div>

                    <div class="d-flex justify-content-evenly mb-5">
                      <button type="submit" name="delete_profile" class="btn btn-danger rounded-4">Delete Account</button>
                      <button type="submit" name="update_profile" class="btn btn-primary rounded-4">Save Changes</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://kit.fontawesome.com/16f6b89e3c.js" crossorigin="anonymous"></script>
</html>

