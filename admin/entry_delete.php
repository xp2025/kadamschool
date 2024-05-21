<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id= $_GET['id'];


$sql= "DELETE FROM total_entry_counts WHERE id=$id";
$result=mysqli_query($conn,$sql);

if(mysqli_query($conn,$sql)){
    $_SESSION['entry_remove_success']=1;
      header("location:entrycount.php");
}else{
       echo "Oh! Not Deleted";
   }

?>
