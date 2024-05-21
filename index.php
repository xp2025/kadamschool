<?php
session_start();
include("db.php");
include("header.php");
?>

<!-- sms start -->
<div class="container">
  <?php if(isset($_SESSION['success'])) { ?>
  <div class="alert alert-success mt-3" role="alert">
  <strong>Success!</strong> Your Information  Added successfully .
  </div>
  <?php }?>
</div>
<!-- sms end -->
<section class="bg-info bg-image">
  <div class="container ">
  <div class="row">
    <div class="col-md-12">
      <div id="my-slider" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#my-slider" data-slide-to="0" class="active"></li>
        <li data-target="#my-slider" data-slide-to="1"></li>
        <li data-target="#my-slider" data-slide-to="2"></li>
        <li data-target="#my-slider" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item carousel-img-1 active">
          <div class="carousel-caption ">
            <h3 class="text-white">কদমবাড়ী উচ্চবিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২০</h3>
            <h5 class="text-white"> এ আপনাকে স্বাগতম</h5>
          </div>
        </div>
        <div class="carousel-item carousel-img-2">
          <div class="carousel-caption ">
            <h5 class="text-primary">শিক্ষা, শান্তি, প্রগতি</h5>
            <p class="text-primary">সবার জন্য শিক্ষা চাই</p>
          </div>
        </div>
        <div class="carousel-item carousel-img-3" >
          <div class="carousel-caption ">
            <h5></h5>
            <p></p>
          </div>
        </div>
        <div class="carousel-item carousel-img-4">
           <div class="carousel-caption text-light">
            <h3 class="text-primary">কদমবাড়ী উচ্চবিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২০</h3>
            <h5 class="text-primary"> এ আপনাকে স্বাগতম</h5>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#my-slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#my-slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      </div>
    </div>
  </div>
</div>
</section>
<!--*******************-->
<section id="icon" class="py-2 text-center bg-image2">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Facebook Group</h2>
                <p>কদমবাড়ী উচ্চবিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২০</p>
                <a href="https://www.facebook.com/groups/kadambarihighschool">
                    <i class="fab fa-facebook"></i></a>
            </div>
            <div class="col-md-4">
                <?php
                include("countdown.php");
                 ?>
            </div>
            <div class="col-md-4">
                <h2>Facebook Page</h2>
                <p>কদমবাড়ী উচ্চবিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২০</p>
                <a href="https://www.facebook.com/pages/kadambarihighschool">
                    <i class="fab fa-facebook"></i></a>
            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");
 ?>
<?php unset($_SESSION['success']);?>
