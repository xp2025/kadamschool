<?php
session_start();
include("db.php");

$token=$_POST['token'];
  $new_pass =$_POST['new_password'];
  $re_new_pass =$_POST['confirm_new_password'];
if($new_pass != $re_new_pass){
$_SESSION['pass_update_error'] ="Password And Confirm Password Did not Match !!";
header("location:admin_reset_password.php?token=$token");
}else {
    $hash = password_hash($new_pass, algo: PASSWORD_BCRYPT);
    $sql= "UPDATE users SET  password='$hash', update_at=now() WHERE token='$token'";
    $update_pass =mysqli_query($conn,$sql);
    if ($update_pass) {
      session_start();
        $_SESSION['pass_update']="Password Update succesfully! Please Loging !!";
        header("location:user_login.php");
    }
      else{
        $_SESSION['pass_not_update']="Password Not Update succesfully!";
        header("location:user_reset_password.php");
      }
  }

?>
