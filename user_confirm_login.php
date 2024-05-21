<?php
session_start();
include("db.php");
$email=$_POST['email'];
$pass=$_POST['password'];
// $user_type=$_POST['user_type'];

// $sql= "SELECT * FROM users WHERE email='$email' and status='inactive'";
// $result = mysqli_query($conn,$sql);
//  $rowcount=mysqli_num_rows($result);
//  if ($result->num_rows == 1) {
//       $_SESSION['email_not_verified']="This Mail Is Not Verified Yet !!";
//       header("location:user_login.php");
//     }else {
//       return true;
//     }




$sql= "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$sql);
 $rowcount=mysqli_num_rows($result);
if($rowcount !== 1){
    $_SESSION['student_not_exit']= "This Student Mail Not Exits !!";
    header("location:user_login.php");
}else{
  $sql= "SELECT * FROM users WHERE email='$email' and user_type='gen_user'";
  $result = mysqli_query($conn,$sql);
  if($result->num_rows > 0){
   $rowcount=$result->fetch_array();
  if(password_verify($pass,$rowcount['password'])){

  if ($result->num_rows == 1 ) {
    if(isset($_POST['remember_me'])){

        setcookie('email_cookie',$email,time()+86400);
        setcookie('password_cookie',$pass,time()+86400);

      session_start();
      $_SESSION['login']=true;
      header("location:user_dash_board/index.php");
    }else {
      session_start();
      $_SESSION['login']=true;
      header("location:user_dash_board/index.php");
    }
  }

  } else{
      $_SESSION['student_error']="Email Or Password is Wrong. Provide Correct Information";
      header("location:user_login.php");
    }
  }else {
    $_SESSION['wrong_student']=1;
    header("location:user_login.php");
  }
}





?>
