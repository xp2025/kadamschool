
<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id =$_GET['id'];
$sql= "SELECT * FROM notice WHERE id=$id";
$result = mysqli_query($conn,$sql);
// Notice Show Code Start

$after_assoc = mysqli_fetch_assoc($result);

$name= $after_assoc['name'];
$pdf =$after_assoc['pdf'];

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
          <?php if(isset($_SESSION['success'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Success!</strong> Notice Deleted successfully .
            </div>
          <?php }?>
          </div>
              <h4 class="mb-4 text-center">Notice Updated Page </h4>
              <div class="row">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th  scope="col">Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td> <?php echo $id?> </td>
                      <td> <?php echo $name?> </td>
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
           <h4 class="mt-2">Update Notice</h4>


           <!-- invalid format -->
           <?php if(isset($_SESSION['errorpdf'])) { ?>
              <div class="alert alert-success mt-3" role="alert">
               <strong>Sorry!</strong> Please Upload Only PDF File.
             </div>
           <?php }?>
           <hr>
<!-- Form Strat from here -->
            <form action="notice_update.php?id=<?php echo $id?>" method="POST"   enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control"  name="name"  value="<?php echo $name;?>" >
                    <input type="hidden" class="form-control"  name="id"  value="<?php echo $id;?>" >
                </div>
                    <div class="form-group">
                    <label for="pdf"> <span style="color:green;"> PDF File </label>
                    <br>

                    <input type="file"  name="pdf" class="form-control" >
                </div>

                <div class="form-group">
                    <div class="btn">
                        <button type="submit" name="submit" class="btn btn-outline-primary">Up Date</button>
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


<?php unset($_SESSION['errorpdf']);?>
