<?php

session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}
include("../db.php");

$response = null;

$input =  file_get_contents('php://input');

$input = json_decode($input,true);

function real_escape_string($string){
  global $conn;
  return mysqli_real_escape_string($conn,$string);
}
$status = true;

$security_code = real_escape_string($input['security_code']);
$name = real_escape_string($input['name']);
$father_name = real_escape_string($input['father_name']);
$mother_name = real_escape_string($input['mother_name']);
$email = real_escape_string($input['email']);
$dob = real_escape_string($input['dob']);
$exam = real_escape_string($input['exam']);
$last_edu = real_escape_string($input['last_edu']);
$mobile = real_escape_string($input['mobile']);
$blood = real_escape_string($input['blood']);
$gender = real_escape_string($input['gender']);
$guest_item = real_escape_string($input['guest_item']);
// $guest_type = real_escape_string(implode(" ",$guest_item));

$verify_sql= "SELECT * FROM total_entry_counts WHERE  mobile='$mobile' ";

$result = mysqli_query($conn,$verify_sql);
 $rowcount=mysqli_num_rows($result);

if($rowcount >= 1){
    $status = false;

}else {

  $insert_query = "INSERT INTO total_entry_counts(security_code,name,father_name,mother_name,email,dob,exam,last_edu,mobile,blood,gender,guest_item) VALUES('$security_code','$name','$father_name','$mother_name','$email','$dob','$exam','$last_edu','$mobile','$blood','$gender','$guest_item')";

  $result = mysqli_query($conn,$insert_query);

}

echo json_encode(['status'=>$status]);
exit();

 ?>
