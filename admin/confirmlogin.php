<?php
session_start();
include("../db.php");

if(isset($_POST['login_btn']))
{

$email=$_POST['email'];
$pass=$_POST['password'];
$user_type=$_POST['user_type'];

$sql= "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$sql);
 $rowcount = mysqli_num_rows($result);
if($rowcount !== 1){

    $_SESSION['user_not_exits']=1;
    header("location:login.php");
}
else
{
  $sql = "SELECT * FROM users WHERE email='$email' and status='1' and user_type='$user_type' LIMIT 1";
  $result = mysqli_query($conn,$sql);
  if($result->num_rows > 0)
  {

   $rowcount = $result->fetch_array();


  if(password_verify($pass,$rowcount['password'])){

  if ($result->num_rows == 1 && $user_type == 'admin') {
    if(isset($_POST['remember_me'])){

        setcookie('email_cookie',$email,time()+86400);
        setcookie('password_cookie',$pass,time()+86400);

      session_start();
      $_SESSION['login']=true;
      header("location:gen_admin/index.php");
    }else {
      session_start();
      $_SESSION['login']=true;
      header("location:gen_admin/index.php");
    }
  } elseif($result->num_rows == 1 && $user_type == 'super_admin' ){
    if(isset($_POST['remember_me'])){

        setcookie('email_cookie',$email,time()+86400);
        setcookie('password_cookie',$pass,time()+86400);

      session_start();
      $_SESSION['login']=true;
      header("location:index.php");
    }else {
      session_start();
      $_SESSION['login']=true;
      header("location:index.php");
    }
  }elseif($result->num_rows == 1 && $user_type == 'moderatore'){
    if(isset($_POST['remember_me'])){

        setcookie('email_cookie',$email,time()+86400);
        setcookie('password_cookie',$pass,time()+86400);

      session_start();
      $_SESSION['login']=true;
      header("location:moderator/index.php");
    }else {
      session_start();
      $_SESSION['login']=true;
      header("location:moderator/index.php");
      }
    }

  }

  else{

      $_SESSION['error']="Email Or Password is Wrong. Please Provide Correct Information";
      header("location:login.php");
    }

  }else {
    $_SESSION['wrong_user']="You have Select Wrong User!";
    header("location:login.php");
  }

}

}


?>
