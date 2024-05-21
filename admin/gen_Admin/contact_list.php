<?php
include("../../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:../../login.php");
}
include("gen_admin_header.php");
// ******** Important *******************
// $sql= "SELECT * FROM contacts";
$sql= "SELECT * FROM contacts ORDER BY contacts . date DESC";
$result = mysqli_query($conn,$sql);
?>


<div class="container">
    <div class="row">

        <div class="col-lg-12 pr-3">
          <?php if(isset($_SESSION['success'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Success!</strong> Contact SMS Delete successfully .
            </div>
          <?php }?>
<!-- ******************************************************************* -->
            <!-- <div class="row">
                <div class="col-lg-2 ml-auto mt-3">
                      <a class="btn btn-secondary" href="report.php">Print</a>
                </div>
            </div> -->
  <!-- ************************************************** -->
           <h1 class="mt-2">Contact List</h1>
           <hr>
<!-- ******************************************************************************************* -->
                <div class="row">
                <div class="col-lg-12">
                  <div class="user-data">
                    <div class="table-responsive table-data">
                  <table class="table table-bordered table-hover mt-3" id="myTable">
                      <thead>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Subject</th>
                          <th width="6%">Date</th>
                          <th>Action</th>

                      </thead>
<!-- ************************************************************************************************************* -->
                      <tbody>
                         <?php while($row = mysqli_fetch_assoc($result)) {?>
                          <tr width="60px" heidth="40px">
                              <td ><?= $row['fname']?></td>
                              <td ><?= $row['lname']?></td>
                              <td ><?= $row['email']?></td>
                              <td ><?= $row['mobile']?></td>
                              <td >
                                  <textarea name="" id="" cols="20" rows="2" ><?= $row['subject']?></textarea>
                              </td>

                              <td><?php echo date('d/m/Y h:i a',strtotime($row["date"]));?></td>
<!-- **************************************************************************************************************************** -->
                              <td><a href="view_contact_list.php?id=<?php echo $row['id'];?>" class="btn btn-info m-0 " ><i class="fas fa-eye"></i> View</a> </td>
<!-- ******************************************************************************** -->
                          </tr>
                         <?php }?>
                      </tbody>
<!-- **************************************************************************************************** -->
                  </table>
                </div>
                </div>
                </div>
              </div>
        </div>
    </div>
</div>

  <br>
<?php
include("gen_admin_footer.php");
 ?>
<?php unset($_SESSION['success']);?>
