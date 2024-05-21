<?php

session_start();
if(!isset($_SESSION['login'])){
header("location:../login.php");
}
include("admin_header.php");
include("../db.php");
// ****************************************************
$id= $_GET['id'];
$sql= "SELECT * FROM contacts where id = $id";
$result = mysqli_query($conn,$sql);
$std= mysqli_fetch_assoc($result);
?>
<!-- ******************************************************************* -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="../favicon/khs.png">
    <title>All View</title>
  </head>
  <body>
<div class="container">
    <div class="row">
      <div class="col-md-2">
          <a href="contact_list.php" class="btn btn-info mt-5">Back</a>
      </div>
        <div class="col-md-10">

           <h1 class="mt-2">Student Details</h1>
           <br>
           <!-- sms -->
           <div class="">
             <?php if(isset($_SESSION['updatesuccess'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
             <strong>Success!</strong> Your Information  Update successfully .
             </div>
             <?php }?>
           </div>
            <table class="table table-bordered  mt-3" >
                <tr>
                    <th>First Name</th>
                    <td ><?= $std['fname']?></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td ><?= $std['lname']?></td>
                </tr>
<!-- *********************************************** -->
                <tr>
                    <th>Email</th>
                    <td><?php echo $std['email']?></td>
                </tr>
<!-- *********************************************** -->
                <tr>
                    <th>Mobile </th>
                    <td><?php echo $std['mobile']?></td>
                </tr>
<!-- *********************************************** -->
                 <tr>
                    <th>Message</th>
                    <td >
                        <textarea class="form-control" name="" id="" cols="20" rows="5" ><?= $std['subject']?></textarea>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>
    <script src="../js/jquery-slim.min.js" ></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
include("admin_footer.php");
 ?>
 <?php unset($_SESSION['updatesuccess']);?>
