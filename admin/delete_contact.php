<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id= $_GET['id'];

$sql= "DELETE FROM contacts WHERE id=$id";
$result=mysqli_query($conn,$sql);

if(mysqli_query($conn,$sql)){
    $_SESSION['success']=1;
      header("location:contact_list.php");
}else{
       echo "Oh! Not Deleted";
   }

?>
