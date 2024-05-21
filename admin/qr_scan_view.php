<?php

session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}
include("admin_header.php");
include("../db.php");
// ****************************************************

$sql= "SELECT * FROM students ";
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
        <div class="col-sm -8">
              <table class="table table-bordered  mt-3" >
                  <tr>
                      <th>Security Code</th>
                      <td><?php echo $std['id']?></td>
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
                      <td><?php echo date('j-M-Y',strtotime($std['dob']));?></td>
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
                      <td><img src="../uploads/<?php echo $std['image']?>" width="100px" height="100px">

                      </td>

                  </tr>
              </table>
            </div>

            <div class="col-sm-4 mt-3">
              <div class="card">
                <div class="card-body">
               <h4 class="mt-2"> Scan Here</h4>

               <div>
               <?php if(isset($_SESSION['publish_news'])) { ?>
                  <div class="alert alert-success mt-3" role="alert">
                   <strong>Success!</strong> You have Published News Successfully.
                 </div>
               <?php }?>
               </div>


               <!-- invalid format -->
               <?php if(isset($_SESSION['error_news'])) { ?>
                  <div class="alert alert-success mt-3" role="alert">
                   <strong>Sorry!</strong> News is not Published.
                 </div>
               <?php }?>
               <hr>
    <!-- Form Strat from here -->
                <form action="news_store.php" method="POST">
                        <div class="form-group">
                        <textarea name="news_description" rows="6" cols="30" placeholder="Write Description Here"></textarea>
                    </div>

                </form>
                <!-- Form End  here  -->
            </div>
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
