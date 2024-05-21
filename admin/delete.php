<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id= $_GET['id'];



// qr code delete code start

$delete_qr_code= "SELECT qr_image FROM students WHERE id=$id";
$delete_qr_code_query=mysqli_query($conn,$delete_qr_code);
$result_qr=mysqli_fetch_assoc($delete_qr_code_query);

$qr_code_name = $result_qr['qr_image'];
$qr_code_destination= '../qr_code_images/'.$qr_code_name;


if (file_exists($qr_code_destination)) {
  unlink($qr_code_destination);
}

// qr code delete code end

// bar code delete code start

$delete_bar_code= "SELECT barcode_image FROM students WHERE id=$id";
$delete_bar_code_query=mysqli_query($conn,$delete_bar_code);
$result_bar=mysqli_fetch_assoc($delete_bar_code_query);

$bar_code_name = $result_bar['barcode_image'];
$bar_code_destination= '../barcode_images/'.$bar_code_name;


if (file_exists($bar_code_destination)) {
  unlink($bar_code_destination);
}

// bar code delete code end

// user image  delete code start
$delete_image= "SELECT image FROM students WHERE id=$id";
$delete_image_query=mysqli_query($conn,$delete_image);
$result=mysqli_fetch_assoc($delete_image_query);
$image_destination= '../uploads/'.$result['image'];


if (file_exists($image_destination)) {
  unlink($image_destination);
}

$sql= "DELETE FROM students WHERE id=$id";
$result=mysqli_query($conn,$sql);

if(mysqli_query($conn,$sql)){
    $_SESSION['success']=1;
      header("location:index.php");
}else{
       echo "Oh! Not Deleted";
   }
// user image  delete code end
?>
