<?php
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

include("../db.php");

$title=$_POST['title'];

$end_date=$_POST['end_date'];



if(isset($_POST['submit'])){
  $insert_query = "INSERT INTO countdowns (title,end_date) VALUES ('$title','$end_date')";
  $result = mysqli_query($conn, $insert_query);

$_SESSION['publish_countdown']=1;
header('location:countdown_post.php');
}else {
  $_SESSION['error_countdown']=1;
  header('location:countdown_post.php');
}

?>
