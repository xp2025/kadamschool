<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id =$_GET['id'];
$title =$_POST['title'];
$news_description =$_POST['news_description'];




  if(isset($_POST['update'])){
    $update_query = "UPDATE news SET  title='$title', news_description='$news_description', date=now()  WHERE id=$id";
    $result = mysqli_query($conn,$update_query);
    $_SESSION['update_news']=1;
     header('location:news_post.php');
  }else {
    $_SESSION['error_news_update']=1;
     header('location:news_edite.php');
  }









?>
