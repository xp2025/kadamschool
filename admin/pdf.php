<?php
session_start();

include("../db.php");


if(!isset($_SESSION['login'])){
header("location:login.php");
}

// ******** Important *******************
$sql= "SELECT * FROM students";
$result = mysqli_query($conn,$sql);


$count_sql= "SELECT id FROM students ORDER BY id ";
$count_result = mysqli_query($conn,$count_sql);
$total_count= mysqli_num_rows($count_result);
$date= date('d-M-Y h:i A');
?>



<!DOCTYPE html>
<html>
<head>
<title>কদমবাড়ী উচ্চবিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২২</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.min.css"> -->
 <style>
/*
 @font-face{
  font-family: "Nikosh";
  src: url("librery/dompdf/custom_bangla_font/Nikosh.ttf");
}

h1, .bn{
  font: normal 30px Nikosh;
  padding-bottom: 10px;


}

/* *{
  font-family: "Nikosh";
} */ */

@page {
     margin: 100px 25px;
}

header {
    position: fixed;
    top: -70px;
    left: 0px;
    right: 0px;
    height: 50px;
    bottom: 50px;

    /** Extra personal styles **/
    background-color: #03a9f4;
    color: white;
    text-align: center;
    line-height: 35px;
}

footer {
  position: fixed;
  bottom: 5px;
  left: 0px;
  right: 0px;
  height: 20px;

  /** Extra personal styles
  background-color: #03a9f4;
  color: white;
  text-align: center;
  line-height: 35px;
  **/
}

table{
  border-collapse: collapse;
  width: 100%;
  max-width: 100%;

}


table,td, th{
  border: 1px solid #000;
  text-align: left;
  padding: 4px;
  text-align:center;
  font-size: 30px;
}

h1{
  text-align: center;
}

</style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="heading">
      <header class="bn">
        <h1>কদমবাড়ী উচ্চবিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২১</h1>
        <!-- <h1>Student List</h1> -->
       </header>
       <br>
       <!-- <div class=" m-3 float-left">
                  <span> Total Guest :</span>

               <?php
                echo $total_count;
               ?>
       </div> -->
       <div class=" m-3 float-left">
                  <span> Total Register Students :</span>

               <?php
                echo $total_count;
               ?>
       </div>
       <br>
    </div>
  </div>
</div>
        <main >
       <div class="container">
         <div class="row">
           <table class="table" style="table-layout:landscape;" >
              <thead>
                <tr>
                 <td>SL No</td>
                 <td>Image</td>
                 <td>Name</td>
                 <td>Father Name</td>
                 <td>Mother Name</td>
                 <td>Email</td>
                 <td>Date Of Birth</td>
                 <td>SSC Year</td>
                 <td>Edu Level</td>
                 <td>Village</td>
                 <td>Mobile No</td>
                 <td>Blood Group</td>
                 <td>Gender</td>
                 <td>Apply Date</td>
               </tr>
               </thead>
               <tbody>
                  <?php $serial=0;
                  while($row = mysqli_fetch_assoc($result)) { $serial+=1; ?>
                   <tr>
                     <td ><?php echo $serial;?></td>
                     <td > <img src="../uploads/<?= $row['image']?>" width="150px">  </td>
                     <td ><?= $row['name']?></td>
                     <td ><?= $row['father_name']?></td>
                     <td ><?= $row['mother_name']?></td>
                     <td ><?= $row['email']?></td>
                     <td ><?= date('d-M-Y',strtotime($row["dob"]))?></td>
                     <td ><?= $row['exam']?></td>
                     <td ><?= $row['last_edu']?></td>
                     <td ><?= $row['village']?></td>
                     <td ><?= $row['mobile']?></td>
                     <td ><?= $row['blood']?></td>
                     <td ><?= $row['gender']?></td>
                    <td > <?= date('d-M-Y h:i A',strtotime($row["date"]))?></td>
                   </tr>
                  <?php }?>
               </tbody>
           </table>
         </div>
       </div>

</main>
<!-- html content -->

<!-- <footer>
      Copyright &copy; <?php echo date('d/m/Y h:i A');?>
</footer> -->
</body>
</html>
