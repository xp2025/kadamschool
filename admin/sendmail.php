<?php
session_start();
include("../db.php");

if(isset($_GET['token'])){

  $token = $_GET['token'];


  $status_update ="UPDATE users SET status='active', create_at=now() WHERE token='$token'";
  $status_result =mysqli_query($conn,$status_update);


if($status_result){
  if(isset($_SESSION['msg'])){
    $_SESSION['msg']="Account activated succesfully";
    header('location:login.php');
  }else {
    $_SESSION['msg'] = "You Are Logged Out.";
    header('location:login.php');
  }

}else {
  $_SESSION['msg'] = "Account Not activated succesfully";
  header('location:registration.php');
}

}

?>
