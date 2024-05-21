<?php
include("../db.php");
session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}
include("admin_header.php");
// ******** Important *******************
// $sql= "SELECT * FROM contacts";
$sql= "SELECT * FROM total_entry_counts ";
$result = mysqli_query($conn,$sql);

//totral entry count
$count_sql= "SELECT id FROM total_entry_counts ORDER BY id ";
$count_result = mysqli_query($conn,$count_sql);
$total_count= mysqli_num_rows($count_result);

// $guest_count= "SELECT extra_person FROM total_entry_counts ";
// $guest_count_result = mysqli_query($conn,$guest_count);
// $guest_total_count= mysqli_num_rows($guest_count_result);

?>

<div class="container ">
    <div class="row">
        <div class="col-lg-12 pr-3">
          <!-- flas sms -->
          <div>
          <?php if(isset($_SESSION['entry_remove_success'])) { ?>
             <div class="alert alert-success mt-3" role="alert">
              <strong>Success!</strong> Entry Info Remove  successfully .
            </div>
          <?php }?>
          </div>
          <!-- flas sms -->
          <div class=" ml-auto">
            <div class=" m-3 float-right p-1 bg-secondary ">
                       <span class="text-light"> Total Entry :</span>

                    <span class="text-light">
                      <?php
                    // $sum =$total_count+$guest_total_count;
                    echo $total_count;
                    ?>
                    </span>
            </div>

          </div>
          <div> <h1 class="mt-2">Entry List</h1>
          </div>
                <!-- <div class="row">
                <div class="col-lg-12"> -->
                  <div class="user-data">
                    <div class="table-responsive table-data">
                  <table class="table table-bordered table-hover mt-3" id="myTable">
                      <thead>
                        <th>SL NO</th>
                          <th>Security Code</th>
                          <th>Name</th>
                          <th>Father Name</th>
                          <th>Mother Name</th>
                          <th>Email</th>
                          <th>Date Of Birth</th>
                          <th>SSC Year</th>
                          <th>Edu Level</th>
                          <th>Mobile No</th>
                          <th>Blood Group</th>
                          <th>Gender</th>
                          <th>Guest Type</th>
                          <th>Entry Time</th>
                          <th>Action</th>
                      </thead>
<!-- ************************************************************************************************************* -->
                      <tbody>
                        <?php
                              $serial=0;
                           while($row = mysqli_fetch_assoc($result)) { $serial+=1;
                             ?>

                             <tr>
                                   <td > <?php echo $serial;?></td>
                                   <td><?php echo $row['security_code']?></td>
                                   <td><?php echo $row['name']?></td>
                                   <td><?php echo $row['father_name']?></td>
                                   <td><?php echo $row['mother_name']?></td>
                                   <td><?php echo $row['email']?></td>
                                   <td><?= date('d/M/Y',strtotime($row["dob"]));?></td>
                                   <td><?php echo $row['exam']?></td>
                                   <td><?php echo $row['last_edu']?></td>

                                   <td><?php echo $row['mobile']?> </td>
                                   <td><?php echo $row['blood']?></td>
                                   <td><?php echo $row['gender']?></td>
                                   <td><?php echo $row['guest_item']?></td>
                                   <td><?php echo date('d/M/Y',strtotime($row["date"]));?></td>
                                   <td>
                                     <div class="dropdown">
                                       <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
                                       </button>
                                       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                         <a class="dropdown-item" onclick="return confirm('Are You Sure?')" href="entry_delete.php?id=<?php echo $row['id'];?>"><i class="far fa-trash-alt"></i> Delete</a>
                                       </div>
                                     </div>
                                   </td>
                               </tr>
                                <!-- <tr>
                                   <th>Apply Date</th>
                                   <td><span id="last_edu"></span></td>
                               </tr> -->

                                <!-- <tr>
                                   <th>Student Picture</th>
                                    <td><span id="image"></span>   </td>
                               </tr> -->
                               <?php
                               // $serial++;
                               }?>
                      </tbody>
                  </table>
                </div>
                </div>
                <!-- </div>
              </div> -->
        </div>
    </div>
</div>

  <br>
<?php
include("admin_footer.php");
 ?>
<?php unset($_SESSION['entry_remove_success']);?>
