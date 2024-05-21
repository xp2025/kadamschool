<?php
  session_start();
  // Generate captcha code
  $random_string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $random_string = str_shuffle($random_string);
   $captcha_code = substr($random_string,0,8);
  // $captcha_code  = substr($random_num, 0, 6);
  // Assign captcha in session
  $_SESSION['CAPTCHA_CODE'] = $captcha_code;
  // Create captcha image
  $layer = imagecreatetruecolor(160, 30);
  $captcha_bg = imagecolorallocate($layer, 247, 174, 55);
  imagefill($layer, 0, 0, $captcha_bg);
  $captcha_text_color = imagecolorallocate($layer, 0, 0, 0);
  imagestring($layer, 5, 55, 10, $captcha_code, $captcha_text_color);
  header("Content-type: image/jpeg");
  imagejpeg($layer);
?>
