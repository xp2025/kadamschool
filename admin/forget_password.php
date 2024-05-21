<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="shortcut icon" type="image/png" href="../favicon/khs.png">
    <title>Forget Password</title>
  </head>
  <body>
    <div class="container" style="margin-top:100px;">
      <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">

           <h2 class="mt-2">Reset Your Password</h2>
           <hr>
                <form  action="recover_account.php" method="post" >
                  <div class="form-group">
                      <?php if(isset($_SESSION['user_not_exits'])) { ?>
                        <div class="text-danger mt-3" role="alert">
                          <strong>Ops! <?php echo $_SESSION['user_not_exits'];?> </strong>
                        </div>
                      <?php }?>

                      <?php if(isset($_SESSION['wrong_user'])) { ?>
                        <div class="text-danger mt-3" role="alert">
                          <strong>Ops! <?php echo $_SESSION['wrong_user'];?> </strong> 
                        </div>
                      <?php }?>

                      <br>
                      <p id="response"></p>
                      <label for="email">Email</label>
                      <input  class="form-control" name="email"  placeholder="Enter Email">
                        <br>
                         <div class="form-group ">
                          <label for="user_type">Select User Type <span class="text-denger">*</span></label>
                          <select id="user_type" name="user_type" class="form-control" >
                            <option value="" selected>Select One</option>
                            <option value="super_admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="moderatore">Moderatore</option>
                          </select>
                          <p class="input_sms text-danger" id="user_type_error"></p>
                      </div>

                      <input type="submit" name="reset_pass_btn" class="btn btn-primary" value="Reset Password">
                  </div>
                </form>
              </div>
        </div>
      </div>
  </body>
</html>
<?php unset($_SESSION['user_not_exits']);?> 
<?php unset($_SESSION['wrong_user']);?>
<!-- <?php unset($_SESSION['error_msg']);?>

<?php unset($_SESSION['email_mass']);?> -->
