
<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id =$_GET['id'];
$sql= "SELECT * FROM news WHERE id=$id";
$result = mysqli_query($conn,$sql);
// Notice Show Code Start

$after_assoc = mysqli_fetch_assoc($result);

$title= $after_assoc['title'];
$news_description =$after_assoc['news_description'];

?>

<!-- Header section add -->
<?php include("admin_header.php"); ?>
<!-- Header section add -->
  <section id="support" class="py-5">
    <div class="container">
      <div class="row pt-5">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
            <!-- <div>
          <?php if(isset($_SESSION['success'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Success!</strong> News Deleted successfully .
            </div>
          <?php }?>
          </div> -->
              <h4 class="mb-4 text-center">News Updated Page </h4>
              <div class="row">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>News Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td> <?php echo $id?> </td>
                      <td> <?php echo $title?> </td>
                      <td> <?php echo $news_description?> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Notice upload Code Start -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
           <h4 class="mt-2">News Update</h4>


           <!-- invalid format -->
           <?php if(isset($_SESSION['error_news_update'])) { ?>
              <div class="alert alert-success mt-3" role="alert">
               <strong>Sorry!</strong> News is not update successfully.
             </div>
           <?php }?>
           <hr>
<!-- Form Strat from here -->
            <form action="news_update.php?id=<?php echo $id?>" method="POST"   enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control"  name="title"  value="<?php echo $title;?>" >
                    <input type="hidden" class="form-control"  name="id"  value="<?php echo $id;?>" >
                </div>
                <div class="form-group">
                    <label for="news_description">News Description</label>
                    <textarea name="news_description" rows="8" cols="40"><?php echo $news_description;?></textarea>
                    <!-- <input type="text" class="form-control"  name="news_description"  value="" > -->
                    <input type="hidden" class="form-control"  name="id"  value="<?php echo $id;?>" >
                </div>

                <div class="form-group">
                    <div class="btn">
                        <button type="submit" name="update" class="btn btn-outline-primary"><i class="fa fa-paper-plane" aria-hidden="true"> Up Date</i></button>
                    </div>
                </div>
            </form>
            <!-- Form End  here  -->
        </div>
    </div>
</div>
<!-- Notice upload Code End -->
</section>

    <script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  <?php include("admin_footer.php");   ?>


<?php unset($_SESSION['error_news_update']);?>
