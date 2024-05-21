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
    $mail->Subject = 'Reset Password';
    $mail_template = "
                      <h2> Requested For Reset Password  </h2>
                      <h5> Do You  Requested For Reset Password? If you want to reset Password Click on the Below Given Links. Not You? Ignore This.</h5>
                      <br/>
                      <a href='http://localhost/Kadambari-Student-Portal/src/admin/admin_reset_password.php?token=$token&email=$email'>Reset Password</a>
                      ";

    $mail->Body    = $mail_template;
    $mail->send();

// end

} // end mail Function

if(isset($_POST['reset_pass_btn']))
{

$email = $_POST['email'];
$user_type = $_POST['user_type'];

$sql= "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$sql);
 $rowcount = mysqli_num_rows($result);
if($rowcount !== 1){

    $_SESSION['user_not_exits'] = "User Not Exits !! Please Try Another Email!!";
    header("location:forget_password.php");
}
else

{

  $sql = "SELECT * FROM users WHERE email='$email' and status='1' and user_type='$user_type' LIMIT 1";
  $result = mysqli_query($conn,$sql);

  if($result->num_rows > 0){
    $rowcount = $result->fetch_array();

    if ($result->num_rows == 1 && $user_type == 'admin' || 'moderatore') {

      $userdata = mysqli_fetch_array($result);
      $name = $userdata['name'];
      $token = $userdata['token'];

    sendemail_verify("$name","$email","$token");

    $_SESSION['password_reset'] ="Hi, $name, Check your Email To Reset your password.";
    header("location:login.php");
  }
  

  }
  else
  {
    
    $_SESSION['wrong_user']="You have Select Wrong User!";
    header("location:forget_password.php");
  }

  }

}




?>
