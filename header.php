<?php
include("db.php");

$sql= "SELECT * FROM news ";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/uikit.min.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/slick-theme.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="css/responsive.dataTables.min.css">
  <script src="https://kit.fontawesome.com/0b5a974696.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="scss/style.scss">
  <link rel="shortcut icon" type="image/x-icon" href="favicon/khs.png">
  <title>কদমবাড়ী উচ্চবিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২০</title>
</head>
<body>

   <section id="showcase" class="bg-success">
        <nav class="navbar navbar-dark  navbar-expand-md" uk-sticky="top: 5; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
  <div class="container ">
    <a href="index.php" class="navbar-brand ">কদমবাড়ী উচ্চবিদ্যালয় </a>
    <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNav" class="collapse navbar-collapse ">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="insert.php">registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="support.php">notice</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">contact </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        sign up/log in
        </a>
        <div class="dropdown-menu bg-success text-light" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="student_registration.php">sign up</a>
          <a class="dropdown-item" href="user_login.php">log in</a>
        </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
   </section>

<!-- News section-->

<section class="news bg-dark">
        <div class="container">
          <div class="row">
          <marquee class="text-light" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
            <?php
            if(mysqli_num_rows($result) >0){
              while($row = mysqli_fetch_assoc($result)) {
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **** &nbsp;&nbsp;&nbsp;&nbsp;", $row["news_description"],"&nbsp;&nbsp;&nbsp;|&nbsp;|";
              }
            }
            ?>
            </marquee>
            </div>
        </div>
    
</section>
<!-- News section end-->
