<?php
session_start();
include("db.php");
$id=$_GET['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$subject=$_POST['subject'];

$sql = "INSERT INTO contacts (fname,lname,email,mobile,subject) VALUES('$fname','$lname','$email','$mobile','$subject')";
$result = mysqli_query($conn,$sql);
if(isset($result)){
  session_start();
  $_SESSION['contact_success']=1;
  header("location:contact.php");
}else{
  session_start();
    $_SESSION['contact_error']=1;
    header("location:contact.php");
}

?>
