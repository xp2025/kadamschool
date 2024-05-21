<?php
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}
include("../db.php");

$name=mysqli_real_escape_string($_POST['name']);

    $uploaded_file = mysqli_real_escape_string($_FILES['file']);
    $after_explode = mysqli_real_escape_string(explode('.',$uploaded_file['name']));
    $extension = mysqli_real_escape_string(end($after_explode));
    $allowed_extension = real_escape_string(array('pdf'));

    if(in_array($extension, $allowed_extension )){
      if($uploaded_file['size'] <= 100000 )){
        $insert_query = "INSERT INTO notice (name) VALUES ('$name')";
        $result = mysqli_query($conn, $insert_query);
        $last_id = mysqli_insert_id($conn);

        $file_name = $last_id.'.'.$extension;
        $new_location = '../uploads_pdf/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);
        $name_to_save_db = $last_id;
        $update = "UPDATE notice SET file='$file_name' WHERE id=$last_id";
        $pdf_result = mysqli_query($conn,$update);

        $_SESSION['upload_pdf'] =1;
        header("location:notice.php");
      }else {
        echo "File is Too Large";
      }

    }else{
        $_SESSION['errorpdf']=1;
        header("location:notice.php");
    }
?>
