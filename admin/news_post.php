
<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}


// $sql= "SELECT * FROM news";
$sql= "SELECT * FROM news ORDER BY news . date DESC";
$result = mysqli_query($conn,$sql);
// Notice Show Code Start

$news_post = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
              <div>
              <?php if(isset($_SESSION['update_news'])) { ?>
                 <div class="alert alert-success mt-3" role="alert">
                  <strong>Success!</strong> You have updated News Successfully.
                </div>
              <?php }?>
              </div>
            <div>
          <?php if(isset($_SESSION['news_delete_success'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Success!</strong> News Deleted successfully .
            </div>
          <?php }?>
          </div>
              <h4 class="mb-4 text-center">News </h4>
              <div class="row">
                <div class="table-responsive table--no-card m-b-30" >
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th >SL</th>
                      <th  >Title</th>
                      <th  >Description</th>
                      <th  width="6%">Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  $serial=0;
                  foreach($news_post as $post): $serial+=1;?>
                    <tr>
                    <td> <?php echo $serial;?> </td>
                      <td> <?php echo $post['title'];?> </td>
                      <td> <?php echo $post['news_description'];?> </td>
                      <td> <?php echo date('d/m/Y h:i a',strtotime($post["date"]));?> </td>
                      <td>
                        <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
                        </button>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="news_edite.php?id=<?php echo $post['id'];?>"><i class="fas fa-edit"></i> Edit</a>
                                <a class="dropdown-item btn btn-danger m-0" onclick="return confirm('Are You Sure?')" href="news_delete.php?id=<?php echo $post['id'];?>"><i class="far fa-trash-alt"></i> Delete</a>
                                </div>
                              </div>
                      </td>
                    </tr>
                    <?php  endforeach ;  ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Notice upload Code Start -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
           <h4 class="mt-2"> Upload News</h4>

           <div>
           <?php if(isset($_SESSION['publish_news'])) { ?>
              <div class="alert alert-success mt-3" role="alert">
               <strong>Success!</strong> You have Published News Successfully.
             </div>
           <?php }?>
           </div>


           <!-- invalid format -->
           <?php if(isset($_SESSION['error_news'])) { ?>
              <div class="alert alert-success mt-3" role="alert">
               <strong>Sorry!</strong> News is not Published.
             </div>
           <?php }?>
           <hr>
<!-- Form Strat from here -->
            <form action="news_store.php" method="POST">
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" required name="title" placeholder="Enter Title" >
                </div>
                    <div class="form-group">
                    <label for="news_description"> Description </label>
                    <br>
                    <textarea name="news_description" rows="8" cols="40" placeholder="Write Description Here"></textarea>
                </div>

                <div class="form-group">
                    <div class="btn">
                        <button type="submit" name="submit" class="btn btn-outline-primary"><i class="fa fa-paper-plane" aria-hidden="true"> News Post</i></button>
                    </div>
                </div>
            </form>
            <!-- Form End  here  -->
        </div>
    </div>
</div>
</div>
</div>
<!-- Notice upload Code End -->
</section>

    <script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  <?php include("admin_footer.php");   ?>


<?php unset($_SESSION['news_delete_success']);?>
<?php unset($_SESSION['publish_news']);?>
<?php unset($_SESSION['update_news']);?>
