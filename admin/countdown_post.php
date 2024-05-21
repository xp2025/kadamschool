
<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

// $sql= "SELECT * FROM news";
$sql= "SELECT * FROM countdowns ORDER BY countdowns . date DESC";
$result = mysqli_query($conn,$sql);
// Notice Show Code Start

$countdown_post = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
              <?php if(isset($_SESSION['update_countdown'])) { ?>
                 <div class="alert alert-success mt-3" role="alert">
                  <strong>Success!</strong> You have updated Countdown Successfully.
                </div>
              <?php }?>
              </div>
            <div>
          <?php if(isset($_SESSION['countdown_delete_success'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Success!</strong> Countdown Deleted successfully .
            </div>
          <?php }?>
          </div>
              <h4 class="mb-4 text-center">Countdown Set Page </h4>
              <div class="row">
                <div class="table-responsive table--no-card m-b-30" >
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th >SL</th>
                      <th  >Title</th>
                      <th  >End Countdown</th>
                      <th  >Created Countdown</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  $serial=0;
                  foreach($countdown_post as $countdown): $serial+=1;?>
                    <tr>
                    <td> <?php echo $serial;?> </td>
                      <td> <?php echo $countdown['title'];?> </td>

                      <td> <?php echo date('d/m/Y h:i A',strtotime($countdown["end_date"]));?> </td>
                      <td> <?php echo date('d/m/Y h:i A',strtotime($countdown["date"]));?> </td>
                      <td>
                        <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
                        </button>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="countdown_edite.php?id=<?php echo $countdown['id'];?>"><i class="fas fa-edit"></i> Edit</a>
                                <a class="dropdown-item btn btn-danger m-0" onclick="return confirm('Are You Sure?')" href="countdown_delete.php?id=<?php echo $countdown['id'];?>"><i class="far fa-trash-alt"></i> Delete</a>
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
           <h4 class="mt-2"> Set Countdown Timer</h4>

           <div>
           <?php if(isset($_SESSION['publish_countdown'])) { ?>
              <div class="alert alert-success mt-3" role="alert">
               <strong>Success!</strong> You have Set Countdown Timer Successfully.
             </div>
           <?php }?>
           </div>


           <!-- invalid format -->
           <?php if(isset($_SESSION['error_countdown'])) { ?>
              <div class="alert alert-success mt-3" role="alert">
               <strong>Sorry!</strong> Countdown Timer is not Set.
             </div>
           <?php }?>
           <hr>
<!-- Form Strat from here -->
            <form action="countdown_store.php" method="POST">
                <div class="form-group">
                    <label for="title">Countdown Timer Title</label>
                    <input type="text" class="form-control" required name="title" placeholder="Enter Countdown Timer Title" >
                </div>

                <div class="form-group">
                <label for="end_date"> Expect Date </label>
                <input type="datetime-local" class="form-control" required name="end_date" placeholder="Enter Countdown Timer Title" value="<?php echo date('Y-m-d\TH:i')?>" >
                </div>

                <div class="form-group">
                    <div class="btn">
                        <button type="submit" name="submit" class="btn btn-outline-primary"><i class="fa fa-paper-plane" aria-hidden="true"> Submit</i></button>
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


<?php unset($_SESSION['countdown_delete_success']);?>
<?php unset($_SESSION['publish_countdown']);?>
<?php unset($_SESSION['update_countdown']);?>
