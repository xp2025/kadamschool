<?php

session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}
include("../db.php");


$id= $_GET['id'];

<form class="" action="" method="post">
  <input type="hidden" name="id" value="<?$row['id']; ? ">
  <input type="submit" name="approve" value="Approved">
  <input type="submit" name="decline" value="Decline ">
</form>

if (isset($_POST['approve'])) {
  $id =$_POST['id'];
  $approve_status ="UPDATE students SET status='approve' WHERE id='$id'";
  $approve_result = mysqli_query($conn,$approve_status);
  $_SESSION['apply_approve']=1;
}

if (isset($_POST['decline'])) {
  $id =$_POST['id'];
  $approve_status ="DELETE FROM students WHERE id='$id'";
  $approve_result = mysqli_query($conn,$approve_status);
  $_SESSION['apply_decline']=1;
}






 ?>
