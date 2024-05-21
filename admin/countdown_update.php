<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id =$_GET['id'];
$title =$_POST['title'];
$end_date =$_POST['end_date'];



  if(isset($_POST['update'])){
    $update_query = "UPDATE countdowns SET  title='$title', end_date='$end_date',date=now()  WHERE id=$id";
    $result = mysqli_query($conn,$update_query);
    $_SESSION['update_countdown']=1;
     header('location:countdown_post.php');
  }else {
    $_SESSION['error_countdown_update']=1;
     header('location:countdown_edite.php');
  }









?>
