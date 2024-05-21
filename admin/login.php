<?php
session_start();
ob_start();
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
    <title>Login</title>
  </head>
  <body>
<div class="py-5">
  <div class="container ">
  <div class="login-wrap">
    <div class="login-content">
        <div class="col-md-6 col-md-offset-3 ">
        
        <h1 class="mt-2">Admin Login </h1>
           <hr>

          <?php if(isset($_SESSION['error'])) { ?>
             <div class="text-danger mt-3" role="alert">
              <strong>Ops! <?php echo $_SESSION['error'];?></strong> 
            </div>
          <?php }?>

          <?php if(isset($_SESSION['user_not_exits'])) { ?>
             <div class="text-warning mt-3" role="alert">
              <strong>Ops!</strong> "User Not Exits !! Please Try Another !!"
            </div>
          <?php }?>

          <?php if(isset($_SESSION['wrong_user'])) { ?>
             <div class="text-danger mt-3" role="alert">
              <strong>Ops! <?php echo $_SESSION['wrong_user'];?> </strong> 
            </div>
          <?php }?>



           <?php if(isset($_SESSION['status'])) { ?>
             <div class="text-success mt-3" role="alert">
              <strong><?php echo $_SESSION['status'];?></strong> 
            </div>
          <?php }?>

          

          <?php if(isset($_SESSION['password_reset'])) { ?>
           <div class="text-success mt-3" role="alert">
           <?php echo $_SESSION['password_reset'];?>
          </div>
        <?php }?>

            <?php if(isset($_SESSION['reg_msg'])) { ?>
             <div class="text-success mt-3" role="alert">
              <strong>Success!</strong> <?php echo $_SESSION['reg_msg'];?>
            </div>
          <?php }?>

            <?php if(isset($_SESSION['reset_password'])) { ?>
             <div class="text-success mt-3" role="alert">
              <strong>Success!</strong> <?php echo $_SESSION['reg_msg'];?>
            </div>
          <?php }?>

            <?php if(isset($_SESSION['reg_msg_error'])) { ?>
             <div class="text-denger mt-3" role="alert">
              <strong>Ohs!</strong> <?php echo $_SESSION['reg_msg_error'];?>
            </div>
          <?php }?>

          <?php if(isset($_SESSION['pass_update'])) { ?>
             <div class="text-success mt-3" role="alert">
              <strong>Success!</strong> <?php echo $_SESSION['pass_update'];?>
            </div>
          <?php }?>

          

          <br>



           <div class="login-form">
            <form action="confirmlogin.php" onsubmit="return valids()" method="POST">

                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value=" <?php if(isset($_COOKIE['email_cookie'])){ echo $_COOKIE['email_cookie'];} ?> ">
                    <p class="input_sms text-danger" id="email_error"></p>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="<?php if(isset($_COOKIE['password_cookie'])){ echo $_COOKIE['password_cookie'];} ?>">
                    <p class="input_sms text-danger" id="password_error"></p>
                </div>

                <div class="form-group ">
                    <label for="user_type">Select User Type <span class="text-denger">*</span></label>
                    <select id="user_type" name="user_type" class="form-control" >
                      <option value="" selected>Select One</option>
                      <option value="super_admin" class="disabled form-control">Super Admin</option>
                      <option value="admin">Admin</option>
                      <option value="moderatore">Moderatore</option>
                    </select>
                    <p class="input_sms text-danger" id="user_type_error"></p>
                </div>

                <div class="form-check form-group">
                <input type="checkbox" class="form-check-input" name="remember_me">
                <label class="form-check-label" for="remember_me">Remember Me</label>
              </div>

                <button type="submit" name="login_btn" class="btn btn-outline-primary ">Login</button>

                <a class="btn btn-outline-primary" href="registration.php"> Sign Up</a>
                <a class="btn btn-outline-primary" href="forget_password.php"> Forgot Password?</a>

            </form>
            </div>
        </div>
        </div>
        </div>
</div>
</div>



    <script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<!--    Form Validation-->
 <script type="text/javascript">
        function valids(){

            var email=document.getElementById('email');
            var password=document.getElementById('password');
            var user_type=document.getElementById('user_type');

             if(email.value==''){
               document.getElementById('email_error').innerHTML="** Please Enter Your Email! **";
                 email.focus();
                 return false;
             }else {
               document.getElementById('email_error').innerHTML="";
             }

            if(password.value==''){
              document.getElementById('password_error').innerHTML="** Please Enter Password! **";
                password.focus();
                return false;
            }else {
              document.getElementById('password_error').innerHTML="";
            }

            if(user_type.value==''){
              document.getElementById('user_type_error').innerHTML="** Please Select User one **";
                user_type.focus();
                return false;
            }else {
              document.getElementById('user_type_error').innerHTML="";
            }


            }
    </script>

    <!-- prevent Inspect Element (disabale right click on the page)-->

    <script type="text/javascript">
    document.addEventListener("contextmenu", function(i){
      i.preventDefault();
    });
    </script>
  </body>
</html>
<?php unset($_SESSION['error']);?>
<?php unset($_SESSION['reg_msg']);?>
<?php unset($_SESSION['reg_msg_error']);?>
<?php unset($_SESSION['password_reset']);?>

<?php unset($_SESSION['user_type_error_selection']);?>
<?php unset($_SESSION['status']);?>

<?php unset($_SESSION['pass_update']);?>
<?php unset($_SESSION['wrong_user']);?>
<?php unset($_SESSION['user_not_exits']);?>
