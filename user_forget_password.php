
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="shortcut icon" type="image/png" href="favicon/khs.png">
    <title>Forget Password</title>
  </head>
  <body>
    <div class="container" style="margin-top:100px;">
      <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">
           <h2 class="mt-2">Reset Your Password</h2>
           <hr>
                <form  action="user_recover_account.php" method="post"  enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="email">Email</label>
                      <br>
                      <p id="response"></p>
                      <input  class="form-control" name="email"  placeholder="Enter Email">
                        <br>
                      <input type="submit" class="btn btn-primary" value="Reset Password">
                  </div>
                </form>
              </div>
            </div>
          </div>
  </body>
</html>
<!-- <?php unset($_SESSION['error_msg']);?>
<?php unset($_SESSION['email_mass']);?> -->
