
<?php
include("../../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:../login.php");
}

$sql= "SELECT * FROM notice ORDER BY notice . date DESC";
$result = mysqli_query($conn,$sql);
// Notice Show Code Start

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!-- Header section add -->
<?php include("gen_admin_header.php"); ?>
<!-- Header section add -->
  <section id="support" class="py-5">
    <div class="container">
      <div class="row pt-5">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
            <div>
          <?php if(isset($_SESSION['success'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Success!</strong> Notice Deleted successfully .
            </div>
          <?php }?>
          </div>
              <h4 class="mb-4 text-center">Notice Board </h4>
              <div class="row">
                <div class="table-responsive table--no-card m-b-30" >
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th width="6%">SL</th>
                      <th  width="100%">Name</th>
                      <th  width="6%">Date</th>
                      <th width="6%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  $serial=0;
                  foreach($files as $file): $serial+=1;?>
                    <tr>
                    <td> <?php echo $serial;?> </td>
                      <td> <?php echo $file['name'];?> </td>
                      <td> <?php echo date('d/m/Y h:i a',strtotime($file["date"]));?></td>
                      <td>
                        <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
                        </button>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="notice_edite.php?id=<?php echo $file['id'];?>"><i class="fas fa-edit"></i> Edit</a>
                                <a class="dropdown-item btn btn-danger m-0 disabled" onclick="return confirm('Are You Sure?')" href="notice_delete.php?id=<?php echo $file['id'];?>"><i class="far fa-trash-alt" ></i> Delete</a>
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
           <h4 class="mt-2">Upload Notice</h4>

           <div>
           <?php if(isset($_SESSION['upload_pdf'])) { ?>
              <div class="alert alert-success mt-3" role="alert">
               <strong>Success!</strong> You have posted Notice Successfully.
             </div>
           <?php }?>
           </div>

           <div>
           <?php if(isset($_SESSION['update_pdf'])) { ?>
              <div class="alert alert-success mt-3" role="alert">
               <strong>Success!</strong> You have updated Notice Successfully.
             </div>
           <?php }?>
           </div>
           <!-- invalid format -->
           <?php if(isset($_SESSION['errorpdf'])) { ?>
              <div class="alert alert-success mt-3" role="alert">
               <strong>Sorry!</strong> Please Upload Only PDF File.
             </div>
           <?php }?>
           <hr>
<!-- Form Strat from here -->
            <form action="notice_store.php" method="POST"   enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" required name="name" placeholder="Enter Name" >
                </div>
                    <div class="form-group">
                    <label for="pdf"> <span style="color:green;">Select PDF File </label>
                    <br>
                    <input type="file" class="form-control" required  name="pdf">
                </div>

                <div class="form-group">
                    <div class="btn">
                        <button type="submit" name="submit" class="btn btn-outline-primary"> <i class="fas fa-upload"> Up Load </i> </button>
                    </div>
                </div>
            </form>
            <!-- Form End  here  -->
        </div>
    </div>
</div>
<!-- Notice upload Code End -->
</section>

    <!-- <script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->

  <?php include("gen_admin_footer.php");   ?>

<?php unset($_SESSION['upload_pdf']);?>
<?php unset($_SESSION['errorpdf']);?>
<?php unset($_SESSION['success']);?>
<?php unset($_SESSION['update_pdf']);?>
