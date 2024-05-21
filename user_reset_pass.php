<?php
session_start();
include("../db.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="shortcut icon" type="image/png" href="../favicon/khs.png">
    <title>Registration</title>
  </head>
  <body>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
          <?php if(isset($_SESSION['error_msg'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Warning!</strong> <?php echo $_SESSION['error_msg'];?>
            </div>
          <?php }?>
          <?php if(isset($_SESSION['email_mass'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Warning!</strong> <?php echo $_SESSION['email_mass'];?>
            </div>
          <?php }?>

           <h1 class="mt-2">Create an account</h1>
           <hr>
            <form action="confirmregistration.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" required name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" required name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" required name="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" required name="confirm_password" placeholder="Enter Confirm Password">
                </div>
                <button type="submit" class="btn btn-outline-primary">Registration</button> Already Have An account?
                <a class="btn btn-outline-primary" href="login.php"> Login</a>
            </form>
        </div>
      </div>
    <script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php unset($_SESSION['error_msg']);?>
<?php unset($_SESSION['email_mass']);?>
