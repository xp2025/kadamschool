<?php

session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

include("../db.php");
// ****************************************************
$id= $_GET['id'];
$sql= "SELECT *FROM students where id = $id";
$result = mysqli_query($conn,$sql);
$std= mysqli_fetch_assoc($result);
?>
<!-- ******************************************************************* -->
<!doctype html>
<html >
  <head>
    <title>কদমবাড়ী উচ্চবিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২০</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon/khs.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
<style>
body{

  border: 5px double solid #000;
  text-align: center;
  margin: 0;
  padding: 0;
}

.content_one table, td{border: 0;}
.content_one .imgs{
  text-align: center;
  height: 152px;
  width: 125px;

}
.clearfix {
  overflow: auto;
}
.content_two, table,th,td{
  text-align: center;
  border: 1px solid #ccc;
  border-collapse: collapse;
  width: 100%;
  text-align: left;
  font-size: 30px;
}


h1{
 text-align: center;
 font-size: 50px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

  </head>
  <body>
<div class="container">
    <div class="row">
           <h1 class="mt-2">কদমবাড়ী উচ্চ বিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২২</h1>
           <h1 class="mt-2">Student Details</h1>
           <br>
           <!-- sms -->

           <div class="row">
             <div class="content_one">

                    <table  border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <!-- <td class="text-center"><img class="card-img-top" src="../uploads/<?php echo $std['image']?>" width="300px" alt="Card image cap"> </td>
                        <td class="text-center d-print-inline-block"><img class="card-img-top" src="../barcode_images/<?php echo $std['barcode_image']?>" width="300px" alt="Card image cap"></td> -->

                        <td width="100%" align="center" valign="middle">
                            <!-- <img src="11.jpg" width="150" height="150" border="1" alt=""> -->
                            <img src="../uploads/<?php echo $std['image']?>" width="160" height="150"  alt="Aplicant Image">
                            <br>
                            <br>
                            <img src="../barcode_images/<?php echo $std['barcode_image']?>" width="160px" height="40px">
                        </td>
                      </tr>
                    </table>

             </div>
           </div>
           <br>
           <div class="row">
             <div class="content_two">
               <table class="table-responsive-lg table-striped"  >
                 <tbody>
                   <tr>
                     <td>Name</td>
                     <td><?php echo $std['name']?></td>
                   </tr>
                   <tr>
                     <td>Father Name</td>
                     <td><?php echo $std['father_name']?></td>
                   </tr>
                   <tr>
                     <td>Mother Name</td>
                     <td><?php echo $std['mother_name']?></td>
                   </tr>
                   <tr>
                      <td>Email</td>
                      <td><?php echo $std['email']?></td>
                  </tr>
                   <tr>
                      <td>Date Of Birth</td>
                      <td>
                        <?php echo date('d-M-Y',strtotime($std["dob"]))?> <?php $bday = date_create($std["dob"]); $submit_day = date_create(date('d-m-Y',strtotime($std["date"])));  $age = date_diff($submit_day,$bday); echo "[ ".$age ->y." " ."Years " ; echo $age->m ." " ."Months "; echo $age->d ." " ."Days ]"; ?>
                      </td>
                  </tr>
                   <tr>
                      <td>SSC Exam Year </td>
                      <td><?php echo $std['exam']?></td>
                  </tr>
                    <tr>
                      <td>Last Eduction Level</td>
                      <td><?php echo $std['last_edu']?></td>
                    </tr>
                    <tr>
                      <td>Village</td>
                      <td><?php echo $std['village']?></td>
                    </tr>
                   <tr>
                      <td>Mobile No</td>
                      <td><?php echo $std['mobile']?></td>
                  </tr>
                    <tr>
                      <td>Blood Group</td>
                      <td><?php echo $std['blood']?></td>
                    </tr>
                   <tr>
                      <td>Gender</td>
                      <td><?php echo $std['gender']?></td>
                  </tr>
                    <tr>
                      <td>Apply Date</td>
                      <td > <?= date('d-M-Y h:i A',strtotime($std["date"])) ?></td>
                    </tr>
                 </tbody>
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
