<?php
session_start();
include("../db.php");
ob_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="shortcut icon" type="image/png" href="../favicon/khs.png">
    <title>Reset Password</title>
  </head>
  <body>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
          <?php if(isset($_SESSION['pass_update_error'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Warning!</strong> <?php echo $_SESSION['pass_update_error'];?>
            </div>
          <?php }?>

          <?php if(isset($_SESSION['pass_not_update'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Warning!</strong> <?php echo $_SESSION['pass_not_update'];?>
            </div>
          <?php }?>

           <h2 class="mt-2">Update Password</h2>
           <hr>
            <form action="reset_password.php" method="POST" >

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" required name="new_password" placeholder="Enter New Password">
                </div>
                <div class="form-group">
                    <label for="confirm_new_password">Re-type New Password</label>
                    <input type="password" class="form-control" required name="confirm_new_password" placeholder="Re-type New Password">
                </div>
                <input type="hidden" name="token" value="<?php echo  $_GET['token']; ?>">
                <button type="submit" class="btn btn-outline-primary"> Update</button>

            </form>
        </div>
</div>
    <script src="../js/jquery-slim.min.js" ></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php unset($_SESSION['pass_update_error']);?>
<?php unset($_SESSION['pass_not_update']);?>
