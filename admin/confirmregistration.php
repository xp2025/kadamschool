<?php
session_start();
include("../db.php");

//Load Composer's autoloader
require "../librery/php_mailer/vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendemail_verify($name,$email,$token)
{

    $mail = new PHPMailer(true);
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'shubhamandalwebguru@gmail.com';                     //SMTP username
    $mail->Password   = 'xusjjhxwwrqnlped ';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("shubhamandalwebguru@gmail.com", $name);
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Varification';
    $mail_template = "
                      <h2> You have Registered  With KHS </h2>
                      <h5> Verify Your Email Address to Login with the Below Given Links</h5>
                      <br/>
                      <a href='http://localhost/Kadambari-Student-Portal/src/admin/verify_email.php?token=$token && email=$email'>Click Here</a>
                      ";


    $mail->Body    = $mail_template;

    $mail->send();
    // echo 'Message has been sent';


// end 

}






if (isset($_POST['register_btn'])) {



$name = $_POST['name'];
$email = $_POST['email'];
$user_type = $_POST['user_type'];
$password = $_POST['password'];
$con_password = $_POST['confirm_password'];

$token = bin2hex(random_bytes(15));

if($password != $con_password){
$_SESSION['error_msg'] ="Password And Confirm Password Did not Match !!";
header("location:registration.php");
}else {
  $sql1= "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn,$sql1);
   $rowcount=mysqli_num_rows($result);
  if($rowcount == 1){

      $_SESSION['email_mass']="Account already Created with This Email! Please Loging !!";
      header("location:registration.php");
  }else{
    $hash= password_hash($password, algo: PASSWORD_BCRYPT);
    $sql= "INSERT INTO users (name,email,user_type,password,token,status) VALUES ('$name','$email','$user_type','$hash','$token','inactive')";
    if(mysqli_query($conn,$sql)){

      sendemail_verify("$name","$email","$token");

      $_SESSION['reg_msg'] = "Hi, $name, Check your Inbox of this Email <strong>$email</strong> To Verify.";
      header('location:index.php');

    }
    else
    {
      $_SESSION['status'] = "Registration Failed!";
      header('location:registration.php');
    }
  }
}

}


?>
