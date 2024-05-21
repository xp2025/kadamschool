<?php
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

include("../db.php");

$name=$_POST['name'];


    $uploaded_file = $_FILES['pdf'];
    $after_explode = explode('.',$uploaded_file['name']);
    $extension = end($after_explode);
    $allowed_extension = array('pdf');
    $file_size=$_FILES["pdf"]["size"];

    if(in_array($extension, $allowed_extension )){
        $insert_query = "INSERT INTO notice (name) VALUES ('$name')";
        $result = mysqli_query($conn, $insert_query);
        $last_id = mysqli_insert_id($conn);

        $file_name = $last_id.'.'.$extension;
        $new_location = '../uploads_pdf/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);
        $name_to_save_db = $last_id;
        $update = "UPDATE notice SET pdf='$file_name' WHERE id=$last_id";
        $pdf_result = mysqli_query($conn,$update);

        $_SESSION['upload_pdf'] =1;
        header("location:notice.php");
    }else{
        $_SESSION['errorpdf']=1;
        header("location:notice.php");
    }
?>
