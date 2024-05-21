<?php
session_start();
include("db.php");
include("header.php");
?>

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
            <form action="student_confirm_registration.php" method="POST">
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
                <button type="submit" name="stu_register_btn" class="btn btn-outline-primary">Sign Up</button> Already Have An account?
                <a class="btn btn-outline-primary" href="user_login.php"> Login</a>
            </form>
        </div>
</div>
<br>
<?php
include("footer.php");
 ?>
 <?php unset($_SESSION['error_msg']);?>
<?php unset($_SESSION['email_mass']);?>
