<?php
session_start();
include("db.php");
if(isset($_GET['token'])){
  $token = $_GET['token'];
  $user_status_update ="UPDATE users SET status='active', create_at=now() WHERE token='$token'";
  $user_status_result =mysqli_query($conn,$user_status_update);
if($user_status_result){
  if(isset($_SESSION['user_activation'])){
    $_SESSION['user_activation']="Account Not Activated !!";
    header('location:student_registration.php');
  }else {
    $_SESSION['user_activation'] = "Account activated succesfully ";
    header('location:user_login.php');
  }
}
}

?>
