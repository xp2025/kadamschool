
<?php
include("../db.php");

$sql= "SELECT * FROM news ";
$result = mysqli_query($conn,$sql);

// $news = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/uikit.min.css">
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/slick-theme.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/responsive.dataTables.min.css">
  <script src="https://kit.fontawesome.com/0b5a974696.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../scss/style.scss">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon/khs.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <title><?php if(isset($page_title)){echo "$page_title";}?></title>
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
          <a class="nav-link" href="index.php"><i class="fas fa-home"></i> home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact_list.php">contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notice.php">notice upload</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="news_post.php">News </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="scanner.php">Scan </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="entrycount.php" target="_blank">Entry List </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="countdown_post.php" >countdown </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="logout.php">log out</a>
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
            <div class="col-md">

<marquee class="text-light" direction="left" onmouseover="this.stop();" onmouseout="this.start();">

<!-- <?php
foreach ($news as $new) {
  echo $new["news_description"],"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **** &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}

 ?> -->

  <?php
  if(mysqli_num_rows($result) >0){
    while($row = mysqli_fetch_assoc($result)) {
      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **** &nbsp;&nbsp;&nbsp;&nbsp;", $row["news_description"],"&nbsp;&nbsp;&nbsp;|&nbsp;|" ;
    }
  }
  ?>
  </marquee>


            </div>
        </div>
    </div>
</section>
<!-- News section end-->
