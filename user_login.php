<?php
session_start();
include("db.php");
include("header.php");
?>

<div class="container ">
  <div class="login-wrap">
    <div class="login-content">
        <div class="col-md-6 col-md-offset-3 center">
          <?php if(isset($_SESSION['student_error'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Ops! <?php echo $_SESSION['student_error'];?></strong> 
            </div>
          <?php }?>

          <?php if(isset($_SESSION['student_not_exit'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Ops !</strong> This Student Mail Not Exits !!
            </div>
          <?php }?>
          <?php if(isset($_SESSION['status'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong> <?php echo $_SESSION['status'];?></strong> 
            </div>
          <?php }?>

          <?php if(isset($_SESSION['wrong_student'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Ops!</strong> Invalid Student Login !!
            </div>
          <?php }?>

            <?php if(isset($_SESSION['reg_msg'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Success!</strong> <?php echo $_SESSION['reg_msg'];?>
            </div>
          <?php }?>

            <?php if(isset($_SESSION['password_reset'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Success!</strong> <?php echo $_SESSION['password_reset'];?>
            </div>
          <?php }?>

            <?php if(isset($_SESSION['email_not_verified'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Ops !</strong> <?php echo $_SESSION['email_not_verified'];?>
            </div>
          <?php }?>

            <?php if(isset($_SESSION['reg_msg_error'])) { ?>
             <div class="alert alert-denger mt-3" role="alert">
              <strong>Ohs!</strong> <?php echo $_SESSION['reg_msg_error'];?>
            </div>
          <?php }?>

           <h1 class="mt-2">Student Login </h1>
           <hr>
           <!-- msm start  -->
           <?php if(isset($_SESSION['user_activation'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
             <strong>Success!</strong> <?php echo $_SESSION['user_activation'];?>
           </div>
         <?php }?>
           <!-- msm end  -->
           <div class="login-form">
            <form action="user_confirm_login.php" onsubmit="return valids()" method="POST">
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    <p class="input_sms text-danger" id="email_error"></p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    <p class="input_sms text-danger" id="password_error"></p>
                </div>
                <button type="submit" class="btn btn-outline-primary">Login</button>
                <a class="btn btn-outline-primary" href="user_forget_password.php"> Forgot Password?</a>
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>
<!--    Form Validation-->
 <script type="text/javascript">
        function valids(){
            var email=document.getElementById('email');
            var password=document.getElementById('password');
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
            }
    </script>
    <!-- prevent Inspect Element (disabale right click on the page)-->
    <script type="text/javascript">
    document.addEventListener("contextmenu", function(i){
      i.preventDefault();
    });
    </script>
    <br>
  <?php include("footer.php"); ?>
<?php unset($_SESSION['student_error']);?>
<?php unset($_SESSION['reg_msg']);?>
<?php unset($_SESSION['reg_msg_error']);?>
<?php unset($_SESSION['user_activation']);?>
<?php unset($_SESSION['student_not_exit']);?>
<?php unset($_SESSION['wrong_student']);?>
<?php unset($_SESSION['email_not_verified']);?>
<?php unset($_SESSION['password_reset']);?>
