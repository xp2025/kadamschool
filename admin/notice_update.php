<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id =$_GET['id'];
$name =$_POST['name'];
$pdf =$_FILES['pdf'];


if($_FILES['pdf']['name'] !=''){

    $delete_file= "SELECT pdf FROM notice WHERE id=$id";
    $delete_file_query=mysqli_query($conn,$delete_file);
    $after_assoc=mysqli_fetch_assoc($delete_file_query);
    $delete_from_location= '../uploads_pdf/'.$after_assoc['pdf'];
    unlink($delete_from_location);

    $uploaded_file = $_FILES['pdf'];
    $after_explode = explode('.',$uploaded_file['name']);
    $extension = end($after_explode);
    $allowed_extension = array('pdf');
    $file_size=$_FILES["pdf"]["size"];

    if(in_array($extension, $allowed_extension )){

        $file_name = $id.'.'.$extension;
        $new_location = '../uploads_pdf/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);
        $name_to_save_db = $file_name;
        $update = "UPDATE notice SET name='$name', pdf='$file_name' WHERE id=$id";
        $pdf_result = mysqli_query($conn,$update);

        $_SESSION['update_pdf'] =1;
        header("location:notice.php");
    }else{
        $_SESSION['errorpdf']=1;
        header("location:notice.php");
    }

}else {
  $update_query = "UPDATE notice SET  name='$name'  WHERE id=$id";
  $result = mysqli_query($conn,$update_query);
  header('location:notice.php');
}

?>
