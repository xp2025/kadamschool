<?php
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

include("../db.php");

$title=$_POST['title'];
$news_description =$_POST['news_description'];

if(isset($_POST['submit'])){
  $insert_query = "INSERT INTO news (title,news_description) VALUES ('$title','$news_description')";
  $result = mysqli_query($conn, $insert_query);

$_SESSION['publish_news']=1;
header('location:news_post.php');
}else {
  $_SESSION['error_news']=1;
  header('location:news_post.php');
}


    //     $file_name = $last_id.'.'.$extension;
    //     $new_location = '../uploads_pdf/'.$file_name;
    //     move_uploaded_file($uploaded_file['tmp_name'], $new_location);
    //     $name_to_save_db = $last_id;
    //     $update = "UPDATE notice SET pdf='$file_name' WHERE id=$last_id";
    //     $pdf_result = mysqli_query($conn,$update);
    //
    //     $_SESSION['upload_pdf'] =1;
    //     header("location:notice.php");
    // }else{
    //     $_SESSION['errorpdf']=1;
    //     header("location:notice.php");
    // }
?>
