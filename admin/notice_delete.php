<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id= $_GET['id'];


$delete_file= "SELECT pdf FROM notice WHERE id=$id";
$delete_file_query=mysqli_query($conn,$delete_file);
$result=mysqli_fetch_assoc($delete_file_query);
$file_destination= '../uploads_pdf/'.$result['pdf'];


if (file_exists($file_destination)) {
  unlink($file_destination);
}

$sql= "DELETE FROM notice WHERE id=$id";
$result=mysqli_query($conn,$sql);

if(mysqli_query($conn,$sql)){
    $_SESSION['success']=1;
      header("location:notice.php");
}else{
       echo "Oh! Not Deleted";
   }

?>
