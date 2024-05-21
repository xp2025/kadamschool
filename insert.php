<?php
session_start();
// if(!isset($_SESSION['login'])){
// header("location:login.php");
// }
include("header.php");
// include("capcha.php");

include("db.php");
$sql= "SELECT * FROM students";
$result = mysqli_query($conn,$sql);
// present Address start
$divisions = "SELECT * FROM divisions ORDER BY name ASC";
$divisions_queries = mysqli_query($conn,$divisions);

// $districts = "SELECT * FROM districts ORDER BY name ASC";
// $districts_queries = mysqli_query($conn,$districts);
//
// $thana = "SELECT * FROM upazilas ORDER BY name ASC";
// $thana_queries = mysqli_query($conn,$thana);
// Parmanent Address Start
$pdivisions = "SELECT * FROM divisions ORDER BY name ASC";
$pdivisions_queries = mysqli_query($conn,$pdivisions);
//
// $pdistricts = "SELECT * FROM districts ORDER BY name ASC";
// $pdistricts_queries = mysqli_query($conn,$pdistricts);
//
// $pthana = "SELECT * FROM upazilas ORDER BY name ASC";
// $pthana_queries = mysqli_query($conn,$pthana);



function generateRandomString()  {
  
   $random_string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $random_string = str_shuffle($random_string);
   $captcha_code = substr($random_string,0,8);
   $_SESSION['CAPTCHA_CODE'] = $captcha_code;
    return $captcha_code;
}

?>

<section id="information" class="form bg-info">
  <div class="container ">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mt-2 text-center text-white">Registration Form </h2>
        <!-- Message part Start -->
        <div class="">
          <?php if(isset($_SESSION['error'])) { ?>
          <div class="alert alert-success mt-3" role="alert">
            <strong>Sorry!</strong> Your Information is Not Save.
          </div>
          <?php }?>
          <!-- photo format****************************************** -->
          <?php if(isset($_SESSION['errorpic'])) { ?>
          <div class="alert alert-denger mt-3" role="alert">
            <strong>Warning!</strong> Please Upload JPG Format Of Picture.
          </div>
          <?php }?>
          <!-- *******************************************************************-->
          <?php if(isset($_SESSION['errorpicsize'])) { ?>
          <div class="alert alert-success mt-3" role="alert">
            <strong>Warning!</strong> Please Upload 300 <span>&times;</span> 300 Pixels Size!.
          </div>
          <?php }?>
          <!-- ******************************************************* -->
          <?php if(isset($_SESSION['student_mass'])) { ?>
          <div class="alert alert-success mt-3" role="alert">
            <strong>Sorry!</strong> You have already Submit Your Information!!
          </div>
          <?php }?>

        </div>
        <!-- Message part end -->
        <form action="store.php" method="POST" onsubmit="return valid()" class="bg-secondary text-white"
          enctype="multipart/form-data">
          <fieldset class="border p-4">
            <legend style="color:white ">
              Fill Up The Form Bellow!
            </legend>
            <div class="form-group  m-o clearfix">
              <div class="form-group col-md-4 float-left ml-0 pl-0">
                <label for="name">Name <span class="text-white">(According To SSC Exam)</span> <span
                    class="text-denger">*</span></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name ">
                <p class="input_sms text-warning " id="name_error"></p>
              </div>
              <div class="form-group col-md-4 float-left ml-0 pl-0">
                <label for="father_name">Father's Name <span class="text-white">(According To SSC Exam)</span> <span
                    class="text-denger">*</span></label>
                <input type="text" class="form-control" name="father_name" id="father_name"
                  placeholder="Enter Your Father's Name">
                <p class="input_sms text-warning" id="father_name_error"></p>
              </div>
              <div class="form-group col-md-4 float-left ml-0 pl-0">
                <label for="mother_name">Mother's Name <span class="text-white">(According To SSC Exam)</span> <span
                    class="text-denger">*</span></label>
                <input type="text" class="form-control" name="mother_name" id="mother_name"
                  placeholder="Enter Your Mother's Name">
                <p class="input_sms text-warning " id="mother_name_error"></p>
              </div>
              <!-- <div class="form-group col-md-4 float-left ml-0 pl-0">
                    <label for="email">Email <span class="text-white">(Optional)</span></label>
                    <input type="email" class="form-control"  name="email" id="email" placeholder="Enter Your Email Address">
                    <p class="input_sms text-warning" id="email_error"></p>
                </div> -->
            </div>
            <!-- removed clearfix tag brom below -->
            <div class="form-group  m-o clearfix">
              <div class="form-group col-md-4 float-left ml-0 pl-0">
                <label for="dob">Date Of Birth<span class="text-denger">*</span></label>
                <input type="date" class="form-control" name="dob" id="dob" value="<?php echo date('Y-m-d')?>">
                <p class="input_sms text-warning " id="dob_error"></p>
              </div>
              <div class="form-group col-md-4 float-left ml-0 pl-0">
                <label for="exam">SSC Eaxm Year <span class="text-denger">*</span></label>
                <input type="text" class="form-control" name="exam" id="exam" placeholder="Enter Your SSC Exam Year">
                <p class="input_sms text-warning " id="exam_error"></p>
              </div>
              <div class="form-group col-md-4 float-left ml-0 pl-0">
                <label for="last_edu">Last Education Level <span class="text-denger">*</span></label>
                <input type="text" class="form-control" name="last_edu" id="last_edu"
                  placeholder="Enter Your Last Education Level">
                <p class="input_sms text-warning " id="last_edu_error"></p>
              </div>
            </div>
            <div class="form-group  m-o clearfix">
              <div class="form-group col-md-4 float-left ml-0 pl-0">
                <label for="last_edu_ins">Last Educational Institute Name<span class="text-denger">*</span></label>
                <input type="text" class="form-control" name="last_edu_ins" id="last_edu_ins"
                  placeholder="Enter Your Last Educational Institute Name">
                <p class="input_sms text-warning " id="last_edu_ins_error"></p>
              </div>
              <div class="form-group col-md-4 float-left ml-0 pl-0">
                <label for="ocupation">Ocupation <span class="text-denger">*</span></label>
                <input type="text" class="form-control" name="occupation" id="occupation"
                  placeholder="Enter Your Ocupation">
                <p class="input_sms text-warning " id="occupation_error"></p>
              </div>
              <div class="form-group col-md-4 float-left ml-0 pl-0">
                <label for="workpalce">Workplace Address <span class="text-denger">*</span></label>
                <input type="text" class="form-control" name="workplace" id="workplace"
                  placeholder="Enter Your Workpalce Address">
                <p class="input_sms text-warning" id="workplace_error"></p>
              </div>
            </div>
            <div class="form-group m-o clearfix">
              <div class="form-group col-md-4 float-left ml-0 pl-0 ">
                <label for="email">Email Address <span class="text-denger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Address">
                <p class="input_sms text-warning" id="email_error"></p>
              </div>
              <!-- <div class="form-group col-md-4 float-left ml-0 pl-0 village">
                  <label for="village">Enter Your Village Nmae <span class="text-denger">*</span></label>
                  <input type="text" class="form-control"  name="village" id="village" placeholder="Enter Your Village Name">
                  <p class="input_sms text-warning" id="village_error" ></p>
              </div> -->
              <div class="form-group col-md-4 float-left ml-0 pl-0 ">
                <label for="mobile">Mobile Number <span class="text-denger">*</span></label>
                <input type="number_format" class="form-control" name="mobile" id="mobile"
                  placeholder="Enter Your 11 Digits Mobile Number">
                <p class="input_sms text-warning" id="mobile_error" style=".error_number{color:red;}"></p>
              </div>
              <div class="form-group col-md-4 float-left ml-0 pl-0 ">
                <label for="blood">Select Your Blood Group <span class="text-denger">*</span></label>
                <select id="blood" name="blood" class="form-control">
                  <option value="" selected>Select One</option>
                  <option value="A+">A+</option>
                  <option value="AB+">AB+</option>
                  <option value="A-">A-</option>
                  <option value="AB-">AB-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                </select>
                <p class="input_sms text-warning" id="blood_error"></p>
              </div>
            </div>
           
            <div class="form-group col-md-12 clearfix">

              <!-- gender part start -->
              <div class="col-md-5 float-left ">
                <div class="col-form-label  pt-0">Select Gender <span class="text-denger">*</span></div>
                <div class="form-check float-left mr-4">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check float-left ml-4">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                  <label class="form-check-label" for="female">Female </label>
                  <p class="input_sms text-warning" id="gender_error"></p>
                </div>
              </div>
              <!-- Gender Part End -->

              <div class="form-group col-md-7 float-left ml-0 pl-0">
                <div class="col-form-label  pt-0">Do You have Guest? <span class="text-denger">*</span></div>
                <div class="form-check float-left mr-4">
                  <label>
                    <input name="guest" type="radio" id="guest_yes" value="1" onclick="test();" /> <span>Yes</span>
                  </label>

                  <span id="extraOption" style="display: none;">
                    <label><span>[Select Guest Type]</span> </label>
                    <input onclick="husband_check();" name="guests[]" value="Husband" id="husband" type="checkbox">
                    <label> Husband</label>
                    <input onclick="wife_check();" name="guests[]" value="Wife" id="wife" type="checkbox">
                    <label> Wife</label>

                    <input onclick="child_check();" name="guests[]" value="Child" id="child" type="checkbox">
                    <label> child</label>
                    <input name="guests[]" id="childRelation" type="number" placeholder="Age" max="12" min="5"
                      style="display: none;">



                    <input onclick="other_check();" name="guests[]" value="Others" id="other" type="checkbox">
                    <label> othres</label>
                    <input name="guests[]" id="otherRelation" type="text" placeholder="Enter name"
                      style="display: none;">
                  </span>

                </div>
                <div class="form-check float-left ml-4">
                  <label><input type="radio" name="guest" id="no_guest" value="0" onclick="test();" />
                    <span>No</span></label>
                  <p class="input_sms text-warning" id="guest_error"></p>
                </div>
              </div>

            </div>
            <!-- capcha start -->
         <div class="form-group col-md-12  ">
           <div class="card mb-2">
             <div class="card-body bg-secondary">
               <div class="col-md-6 form-group float-left"><label for="captcha-code">Captcha Code</label>
                 <div class="captcha" id="captcha_code"><?php echo json_encode(generateRandomString());?></div>
               </div>

               <div class="col-md-6 form-group float-left"><label for="captcha">Captcha</label>
               <input type="text" name="captcha" id="captcha" placeholder="Enter Captcha"  class="form-control" />
               
                   <p class="input_sms text-warning" id="captcha_error"></p>
               </div>
             </div>


           </div>
         </div>
            <!-- capcha end -->
            <div class="clearfix"></div>
            <!-- Address part start -->
            <div class="form-group  ">
              <div class="form-group col-md-6 float-left  ">
                <div class="present mr-2">
                  <div class="card ">
                    <h5 class="card-header bg-secondary">Present Address <span class="text-denger">*</span></h5>
                    <div class="card-body bg-secondary text-white">
                      <table class="table bg-secondary text-white">
                        <tbody>
                          <tr>
                            <td>Village/Town/<br />Road/House/Flat</td>
                            <td>
                              <!-- <input type="text" placeholder="Enter Village Name" class="form-control"> -->
                              <textarea class="form-control" name="village" id="village" rows="1" cols="45"></textarea>
                              <p class="input_sms text-warning" id="village_error"></p>
                            </td>
                          </tr>
                          <tr>
                            <td class="form-group">Division</td>
                            <td>
                              <select class='form-control' id="division" name="division">
                                <option selected disabled>Select Division</option>
                                <?php  while ($row = mysqli_fetch_assoc($divisions_queries)) :?>
                                <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?></option>
                                <?php endwhile;?>
                              </select>
                              <p class="input_sms text-warning" id="division_error"></p>
                            </td>
                          </tr>
                          <tr>
                            <td class="form-group">District</td>
                            <td>
                              <select class='form-control' id="district" name="district">
                                <option selected disabled> Select District </option>
                              </select>
                              <p class="input_sms text-warning" id="district_error"></p>
                            </td>
                          </tr>
                          <tr>
                            <td class="form-group">Upzilla/Thana</td>
                            <td>
                              <select class='form-control' id="thana" name="thana">
                                <option selected disabled>Select Upzilla/Thana</option>
                              </select>
                              <p class="input_sms text-warning" id="thana_error"></p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Parmanent address -->
              <div class="form-group col-md-6 float-left mr-0 pl-0">
                <div class="permanent">
                  <div class="card ">
                    <h5 class="card-header bg-secondary">
                      Permanent Address <span class="text-denger">*</span>
                      <input type="checkbox" name="copy" id="parmanent_address"
                        aria-label="Checkbox for following text input">
                      <small>Same As Present Address</small>
                    </h5>
                    <div class="card-body bg-secondary text-white">
                      <table class="table bg-secondary text-white " style="border: none !important">
                        <tbody class="">
                          <tr>
                            <td>Village/Town/<br />Road/House/Flat</td>
                            <td>
                              <textarea class="form-control" name="pvillage" id="pvillage" rows="1"
                                cols="45"></textarea>
                              <p class="input_sms text-warning" id="pthana_error"></p>
                            </td>
                          </tr>
                          <tr>
                            <td class="form-group">Division</td>
                            <td>
                              <select class='form-control' id="pdivision" name="pdivision">
                                <option selected disabled>Select Division</option>
                                <?php  while ($row_division = mysqli_fetch_assoc($pdivisions_queries)) :?>
                                <option value="<?php echo $row_division['id'];?>"> <?php echo $row_division['name'];?>
                                </option>
                                <?php endwhile;?>
                              </select>
                              <p class="input_sms text-warning" id="pdivision_error"></p>
                            </td>
                          </tr>
                          <tr>
                            <td class="form-group">District</td>
                            <td>
                              <select class='form-control' id="pdistrict" name="pdistrict">
                                <option selected disabled>Select District</option>
                              </select>
                              <p class="input_sms text-warning" id="pdistrict_error"></p>
                            </td>
                          </tr>
                          <tr>
                            <td>Upzilla/Thana</td>
                            <td>
                              <select class='form-control' id="pthana" name="pthana">
                                <option selected disabled>Select Upzilla/Thana</option>
                              </select>
                              <p class="input_sms text-warning" id="pthana_error"></p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Address part end -->

            <div class="form-group   clearfix"></div>
            <!-- photo Part start -->
            <div class="form-group col-md-12 clearfix mt-3">
              <label for="image">Photo <span class="text-denger">*</span> <span style="color:white;">[Photo Sholud be
                  JPG Format And 300<span>&times;</span>300 Pixels and not more than 100KB]</span></label><br>
              <label for="imagepreview">Image Preview</label>
              <img src="img/default_user.png" alt="Avatar" id="preimge" width="100" height="100" class="p-1 avatar">
              <script type="text/javascript">
                function loadfile(event) {
                  var output = document.getElementById('preimge');
                  output.src = URL.createObjectURL(event.target.files[0]);
                }
              </script>
              <br>
              <input type="file" name="image" id="image" onchange="loadfile(event)">
              <p class="input_sms text-warning" id="photo_error"></p>
            </div>
            <!-- photo Part End -->
            <!-- Start Button section-->
            <div class="btn ">
              <div class="row">
                <div class="col-lg-12 ">
                  <button type="submit" class="btn btn-outline-primary text-black btn-light btn-lg m-3 p-2"><i
                      class="fa fa-paper-plane" aria-hidden="true"> Submit</i></button>
                </div>
              </div>
            </div>
            <!--End Button section-->
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</section>
<?php
include("footer.php");
 ?>

<!-- Guest selection option Start -->
<script src="js/mainjs/guest.js"></script>

<!-- Guest selection option End -->
<!-- Form Validation Start -->
<script src="js/mainjs/formvalidation.js"></script>
<!-- Form Validation end -->

<!-- division, district, thana changes script -->
<script src="js/mainjs/division_district_thana.js"></script>
<!--  copyaddress of present address -->
<script src="js/mainjs/copyaddress.js"></script>
<!--  copyaddress of present address end-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</body>

</html>
<?php unset($_SESSION['error']);?>
<?php unset($_SESSION['errorpic']);?>
<?php unset($_SESSION['errorpicsize']);?>
<?php unset($_SESSION['student_mass']);?>