<?php

session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}
include("admin_header.php");
include("../db.php");
// ****************************************************
$id= $_GET['id'];
$sql= "SELECT *FROM students where id = $id";
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
    <div class="container-fluid bg-secondary ">
      <div class="container bg-info text-white">
    <div class="row">
      <div class="col-md">
          <a href="index.php" class="btn btn-info mt-5">Back</a>
      </div>
        <div class="col-md-12">

           <h1 class="mt-2 text-center">Student Details</h1>
           <br>
           <!-- sms -->
           <div class="">
             <?php if(isset($_SESSION['updatesuccess'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
             <strong>Success!</strong> Your Information  Update successfully .
             </div>
             <?php }?>
           </div>

            <table class=" width="100%" border="0" cellpadding="5" cellspacing="0"  >
              <tbody>
                <tr>
                    <td width="25%" align="center" valign="middle">
                    <img src="../uploads/<?php echo $std['image']?>" width="200px" height="200px">
                    <img src="../barcode_images/<?php echo $std['barcode_image']?>" width="100px" height="30px">
                  </td>
                  <td width="75%" align="center" valign="top">
                    <table width="100%" border="1" cellpadding="2" cellspacing="1" table table-bordered  mt-3 text-white" >
                        <tbody>
                    <tr>
                        <th>User ID</th>
                        <td><?php echo $std['string']?></td>
                    </tr>
                    <tr>
                        <th>Student Name</th>
                        <td><?php echo $std['name']?></td>
                    </tr>
    <!-- *********************************************** -->
                    <tr>
                        <th>Father Name</th>
                        <td><?php echo $std['father_name']?></td>
                    </tr>
    <!-- *********************************************** -->
                    <tr>
                        <th>Mother Name</th>
                        <td><?php echo $std['mother_name']?></td>
                    </tr>
    <!-- *********************************************** -->
                     <tr>
                        <th>Student Email</th>
                        <td><?php echo $std['email']?></td>
                    </tr>
                     <tr>
                        <th>Date Of Birth</th>
                        <td><?php echo date('d-M-Y',strtotime($std['dob']));?></td>
                    </tr>
    <!-- *********************************************** -->
                     <tr>
                        <th>SSC Exam Year</th>
                        <td><?php echo $std['exam']?></td>
                    </tr>
    <!-- *********************************************** -->
                     <tr>
                        <th>Last Eduction Level</th>
                        <td><?php echo $std['last_edu']?></td>
                    </tr>
                     <tr>
                        <th>Village Name</th>
                        <td><?php echo $std['village']?></td>
                    </tr>
    <!-- *********************************************** -->
                     <tr>
                        <th>Student Mobile</th>
                        <td><?php echo $std['mobile']?></td>
                    </tr>
    <!-- *********************************************** -->
                     <tr>
                        <th>Blood Group</th>
                        <td><?php echo $std['blood']?></td>
                    </tr>
      <!-- *********************************************** -->
                     <tr>
                        <th>Gender</th>
                        <td><?php echo $std['gender']?></td>
                    </tr>
                     <tr>
                        <th>Apply Date</th>
                        <td><?php echo date('d-M-y h:i A',strtotime($std["date"]));?></td>
                    </tr>
    <!-- *********************************************** -->
                     <tr>
                        <th>Student Picture</th>
                        <td>
                          <img src="../qr_code_images/<?php echo $std['qr_image']?>" width="200px" height="200px">
                        </td>

                    </tr>

                  </tbody>
              </table>
                  </td>
                </tr>

            </table>
        </div>
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
