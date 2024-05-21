<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id= $_GET['id'];

$news_delete_sql= "DELETE FROM countdowns WHERE id=$id";
$result=mysqli_query($conn,$news_delete_sql);

if(mysqli_query($conn,$news_delete_sql)){
    $_SESSION['countdown_delete_success']=1;
      header("location:countdown_post.php");
}else{
       echo "Oh! Not Deleted";
   }

?>
