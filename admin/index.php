<?php
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}
include("admin_header.php");

include("../db.php");
// ******** Important *******************
$sql= "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

// total register count
$count_sql= "SELECT id FROM students ORDER BY id ";
$count_result = mysqli_query($conn,$count_sql);
$total_count= mysqli_num_rows($count_result);

// $guest_count= "SELECT extra_person FROM students ORDER BY id ";
// $gues_count_result = mysqli_query($conn,$count_sql);
// $gues_total_count= mysqli_num_rows($count_result);

?>
<!--******** Important ******************* -->

<div class="container-fluid ">
<div class="container">
    <div class="row">
        <div class="col-lg-12">

          <div>
          <?php if(isset($_SESSION['success'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Success!</strong> Student Information Delete successfully .
            </div>
          <?php }?>
          </div>
                <div class=" ml-auto">
                      <a class="btn btn-secondary mt-3 float-right" href="report.php">Export Data</a>
                      <!-- <a class="btn btn-secondary mr-3 mt-3 float-right" href="test_report.php">Print</a> -->
                </div>
                <div class=" ml-auto">
                  <div class=" m-3 float-right p-1 text-light bg-info">
                             <span >Total Guest  :</span>

                          <!-- <?php
                           echo $gues_total_count;
                          ?> -->
                  </div>
                  <div class=" m-3 float-right p-1 text-light bg-info">
                             <span > Total Register Students :</span>
                          <?php
                           echo $total_count;
                          ?>
                  </div>
                </div>
           <div class=" float-left mr-auto inline-block"><h1 class="mt-2">Student List</h1> </div>
                  <div class="table-responsive table--no-card m-b-30">
                  <table class="table data-table table-sm table-bordered table-hover " id="myTable">
                      <thead>
                          <tr>
                          <th>SL NO</th>
                          <th>Security Code</th>
                          <th>Name</th>
                          <th>Father Name</th>
                          <th>Mother Name</th>
                          <th>Email</th>
                          <th>Date Of Birth</th>
                          <th>SSC Year</th>
                          <th>Edu Level</th>
                          <th>Last Edu Inst Name</th>
                          <th>Occupation</th>
                          <th>Workplace</th>
                          <th>Mobile No</th>
                          <th>Blood Group</th>
                          <th>Gender </th>
                          <th>Guest Type </th>
                          <!-- <th>Trx ID</th>
                          <th>Gender</th>
                          <th>Guest Type</th> -->
                          <th>Image</th>
                          <th >Date</th>
                          <th >Status</th>
                          <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                         <?php
                            $serial=0;
                         while($row = mysqli_fetch_assoc($result)) { $serial+=1;
                           ?>
                          <tr>
                              <td ><?php echo $serial;?></td>
                              <td > <?= $row['string']?> </td>
                              <td ><?= $row['name']?></td>
                              <td ><?= $row['father_name']?></td>
                              <td ><?= $row['mother_name']?></td>
                              <td ><?= $row['email']?></td>
                              <td ><?= date('d/m/Y',strtotime($row["dob"]));?></td>
                              <td ><?= $row['exam']?></td>
                              <td ><?= $row['last_edu']?></td>
                              <td ><?= $row['last_edu_ins']?></td>
                              <td ><?= $row['occupation']?></td>
                              <td width="50%"><?= $row['workplace']?></td>
                              <td ><?= $row['mobile']?></td>
                              <td ><?= $row['blood']?></td>
                              <!-- <td ><?= $row['bkash']?></td>
                              <td ><?= $row['taka']?></td>
                              <td ><?= $row['trxid']?></td> -->
                              <td ><?= $row['gender']?></td>
                              <td ><?= $row['guest_item']?></td>
                              <td > <img src="../uploads/<?= $row['image']?>" width="50">  </td>
                              <td > <?php echo date('d/M/y h:i A',strtotime($row["date"]));?></td>
                              <td >
                                <?= $row['status']?>
                              </td>
                              <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="aplicant.php?id=<?php echo $row['id'];?>"><i class="fas fa-eye"></i> View</a>
                                      <a class="dropdown-item" href="person_details.php?id=<?php echo $row['id'];?>"><i class="fas fa-download"></i> Download</a>
                                      <a class="dropdown-item" href="edit.php?id=<?php echo $row['id'];?>"><i class="fas fa-edit"></i> Edit</a>
                                      <a class="dropdown-item" onclick="return confirm('Are You Sure?')" href="delete.php?id=<?php echo $row['id'];?>"><i class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                  </div>
                          </td>
                          </tr>
                         <?php
                         // $serial++;
                       }?>
                      </tbody>
                  </table>
                  </div>
        </div>
    </div>
</div>
</div>
<br>
<?php
include("admin_footer.php");
 ?>
<?php unset($_SESSION['success']);?>
