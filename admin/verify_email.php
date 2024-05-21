<?php
session_start();
include("../db.php");

if(isset($_GET['token'])){

  $token = $_GET['token'];

  $verify_query ="SELECT token,status FROM users  WHERE token='$token' LIMIT 1";
  $verify_query_result = mysqli_query($conn,$verify_query);

if(mysqli_num_rows($verify_query_result) > 0)
{
    $row = mysqli_fetch_array($verify_query_result);
    
    if($row['status'] == "0")
    {
        $clicked_token = $row['token'];
        $update_query = "UPDATE users SET status = '1' WHERE token='$clicked_token' LIMIT 1 ";
        $update_query_run = mysqli_query($conn,$update_query);

        if($update_query_run)
        {
            $_SESSION['status'] = "Your Account activated Successfully. Please login";
            header('location:login.php');
        }
        else
        {
            $_SESSION['status'] = "Verification Failed";
            header('location:login.php');
        }
    }
    else
    {
        $_SESSION['status'] = "This Email Already Verified. Please login";
        header('location:login.php');
        exit(0);
    }
}
else
{
    $_SESSION['status'] = "This Email is not Exists";
    header('location:login.php');
}

}
else
{
    $_SESSION['status'] = "Not Allowed";
    header('location:login.php');
}


// ****************************
// if($status_result){
//   if(isset($_SESSION['msg'])){
//     $_SESSION['msg']="Account activated succesfully";
//     header('location:login.php');
//   }else {
//     $_SESSION['msg'] = "You Are Logged Out.";
//     header('location:login.php');
//   }

// }else {
//   $_SESSION['msg'] = "Account Not activated";
//   header('location:registration.php');
// }
// *********************
// }

?>
