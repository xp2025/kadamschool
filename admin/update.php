<?php
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}
include("../db.php");

 $id=$_GET['id'];

 $name=$_POST['name'];
 $father_name=$_POST['father_name'];
 $mother_name=$_POST['mother_name'];
 $email=$_POST['email'];
 $dob=$_POST['dob'];
 $exam=$_POST['exam'];
 $last_edu=$_POST['last_edu'];
 $village=$_POST['village'];
 $mobile=$_POST['mobile'];
 $blood=$_POST['blood'];
 $bkash=$_POST['bkash'];
 $taka=$_POST['taka'];
 $trxid=$_POST['trxid'];
 $gender=$_POST['gender'];

 

 if($_FILES['image']['name'] !=''){
  $select_photo = "SELECT image FROM students WHERE id=$id";
  $del_photo_query = mysqli_query($conn,$select_photo);
  $after_assoc = mysqli_fetch_assoc($del_photo_query);
  $delete_from_location = "../uploads/". $after_assoc['image'];

  // if (file_exists($delete_from_location)) {
  unlink($delete_from_location);
  // }

  $uploaded_file = $_FILES['image']['tmp_name'];
list($width, $height, $type, $attr) = getimagesize($uploaded_file);

  $uploaded_file = $_FILES['image'];
  $after_explode = explode('.',$uploaded_file['name']);
  $extention = end($after_explode);
  $allowed_extention = array('jpg');
  if(in_array($extention, $allowed_extention)){
    if($uploaded_file['size'] <= 100000 && ($width == 300 && $height == 300)){
      $file_name = $id.'.'.$extention;
      $new_location = '../uploads/'.$file_name;
      move_uploaded_file($uploaded_file['tmp_name'], $new_location);
      $name_to_save_db = $file_name;
      $update = "UPDATE students SET image='$file_name' WHERE id=$id";
      $photo_updateded = mysqli_query($conn,$update);

      $update_query = "UPDATE students SET name='$name',father_name='$father_name',mother_name='$mother_name', email='$email',dob='$dob', exam='$exam',last_edu='$last_edu',village='$village',mobile='$mobile',blood='$blood',bkash='$bkash',taka='$taka',trxid='$trxid', gender='$gender' WHERE id=$id";
      $result = mysqli_query($conn, $update_query);

      header('location:view.php?id='.$id);
    }
    else{
      session_start();
        $_SESSION['errorpicsize']=1;
      header('location:edit.php?id='.$id);
    }
  }
  else{
    session_start();
      $_SESSION['errorpic']=1;
    header('location:edit.php?id='.$id);
  }
}

else{
  $update_query = "UPDATE students SET name='$name',father_name='$father_name',mother_name='$mother_name', email='$email',dob='$dob', exam='$exam',last_edu='$last_edu',village='$village',mobile='$mobile',blood='$blood',bkash='$bkash',taka='$taka',trxid='$trxid', gender='$gender' WHERE id=$id";
  $result = mysqli_query($conn, $update_query);

  session_start();
    $_SESSION['updatesuccess']=1;
  header('location:view.php?id='.$id);
}


?>
