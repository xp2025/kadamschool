<?php
include("../db.php");
session_start();
include("admin_header.php");
if(!isset($_SESSION['login'])){
header("location:login.php");
}

$id= $_GET['id'];

$sql= "SELECT * FROM students where id = $id";
$result = mysqli_query($conn,$sql);

$std= mysqli_fetch_assoc($result);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="shortcut icon" type="image/png" href="../favicon/khs.png">
    <title>Update</title>
  </head>
  <body>

<div class="container-fluid bg-secondary text-white">
  <div class="container bg-info text-white">
      <div class="row">
          <div class="col-md">
              <a href="index.php" class="btn btn-info mt-5">Back</a>
          </div>
          <div class="col-md-12">
             <h1 class="mt-2 text-center">Up Date Student Information</h1>
             <?php if(isset($_SESSION['errorpicsize'])) { ?>
                <div class="alert alert-success mt-3" role="alert">
                 <strong>Sorry !!</strong> Please upload 300<span>&times;</span>300 Pixels Photo and not more than 100KB.
               </div>
             <?php }?>
             <!-- invalid format -->
             <?php if(isset($_SESSION['errorpic'])) { ?>
                <div class="alert alert-success mt-3" role="alert">
                 <strong>Sorry !!</strong> Please Upload JPG Format Photo.
               </div>
             <?php }?>
             <hr>

              <form action="update.php?id=<?php echo $id?>" onsubmit="return valid_update()" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control"  name="name" id="name" value="<?php echo $std['name']?>">
                      <p class="input_sms text-warning" id="name_error" ></p>
                  </div>


                  <div class="form-group">
                      <label for="father_name">Father's Name <span class="text-light">(According To SSC Registration)</span> <span class="text-white">*</span></label>
                      <input type="text" class="form-control"  name="father_name" id="father_name" placeholder="Enter Your Father's Name According To SSC Registration" value="<?php echo $std['father_name']?>">
                      <p class="input_sms text-red" id="father_name_error" ></p>
                  </div>

                  <div class="form-group">
                      <label for="mother_name">Father's Name <span class="text-light">(According To SSC Registration)</span> <span class="text-white">*</span></label>
                      <input type="text" class="form-control" required name="mother_name" id="mother_name" placeholder="Enter Your Father's Name According To SSC Registration" value="<?php echo $std['mother_name']?>">
                      <p class="input_sms text-red" id="mother_name_error" ></p>
                  </div>

                  <div class="form-group">
                      <label for="name">Email</label>
                      <input type="email" class="form-control" required name="email" id="email"  value="<?php echo $std['email']?>">
                      <p class="input_sms text-red" id="email_error" ></p>
                  </div>

                  <div class="row">
                  <div class="form-group col-md-4 float-left ">
                      <label for="exam">Date Of Birth</label>
                      <input type="date" class="form-control" required name="dob" id="dob"  value="<?php echo date('Y-m-d',strtotime($std['dob']))?>">
                      <p class="input_sms text-red" id="update_dob_error" ></p>
                  </div>
                  <div class="form-group col-md-4 float-left ">
                      <label for="exam">SSC Exam Year</label>
                      <input type="text" class="form-control" required name="exam" id="exam"  value="<?php echo $std['exam']?>">
                      <p class="input_sms text-red" id="exam_error" ></p>
                  </div>
                  <div class="form-group col-md-4 float-left">
                      <label for="last_edu">Last Education Level</label>
                      <input type="text" class="form-control" required name="last_edu" id="last_edu" value="<?php echo $std['last_edu']?>">
                      <p class="input_sms text-red" id="last_edu_error" ></p>
                  </div>
                  </div>

                <div class="row">
                      <div class="form-group col-md-4 float-left ">
                      <label for="village">Village Name</label>
                      <input type="text" class="form-control" required name="village"  id="village" value="<?php echo $std['village']?>">
                        <p class="input_sms text-warning" id="village_error" ></p>
                  </div>
                      <div class="form-group col-md-4 float-left ">
                      <label for="name">Mobile</label>
                      <input type="number_format" class="form-control" required name="mobile" id="mobile"  value="<?php echo $std['mobile']?>">
                      <p class="input_sms text-warning" id="mobile_error" style=".error_number{color:red;}"></p>
                  </div>
                  <div class="form-group col-md-4 float-left ">
                      <label for="blood">Select Your Blood Group </label>
                      <input type="text" class="form-control" required name="blood" id="blood" value="<?php echo $std['blood']?>">
                      <p class="input_sms text-warning" id="blood_error"></p>
                  </div>
                </div>

                <div class="row">
                      <div class="form-group col-md-4 float-left ">
                      <label for="bkash">Bkash Number</label>
                      <input type="number_format" class="form-control" required name="bkash" id="bkash" placeholder="Enter Mobile No" value="<?php echo $std['bkash']?>">
                      <p class="input_sms text-warning" id="bkash_error"></p>
                  </div>
                  <div class="form-group col-md-4 float-left ">
                  <label for="bkash">Amount</label>
                  <input type="number_format" class="form-control" required name="taka" id="taka" placeholder="Enter Mobile No" value="<?php echo $std['taka']?>">
                  <p class="input_sms text-warning" id="taka_error"></p>
              </div>
                  <div class="form-group col-md-4 float-left ">
                      <label for="trxid">Bkash Tranjection ID </label>
                      <input type="text" class="form-control" required name="trxid" id="trxid" value="<?php echo $std['trxid']?>">
                      <p class="input_sms text-warning" id="trxid_error"></p>
                  </div>
                </div>


                  <div class="row">
                      <div class="form-group col-md-6">
                      <label for="gender">Gender</label>
                      <input type="text" class="form-control"  name="gender"  value="<?php echo $std['gender']?>">
                      <p class="input_sms text-warning" id="gender_error"></p>
                  </div>
                  </div>

                 <div class="row">
                      <div class="form-group col-md-6">
                      <label for="image"> <span style="color:white;">Image Sholud be 300<span>&times;</span>300 Pixels and not more than 100KB</span> </label>
                      <br>
                      <img src="../uploads/<?php echo $std['image']?>" style="width:80px; height:60px">
                      <input type="file" class="form-control"  name="image" placeholder="change Image" value="<?php echo $std['image']?>">
                  </div>
                 </div>

                  <div class="btn">
                      <div class="row">
                          <button type="submit" class="btn btn-outline-secondary bg-light">Up Date</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>




<!-- Form Validation Start -->
  <script type="text/javascript">

      function valid_update(){
          var name=document.getElementById('name');
          var father=document.getElementById('father_name');
          var mother=document.getElementById('mother_name');
          var email=document.getElementById('email');
          var dob=document.getElementById('dob');
          var exam=document.getElementById('exam');
          var last_edu=document.getElementById('last_edu');
          var village=document.getElementById('village');
          var mobile=document.getElementById('mobile');
          var blood=document.getElementById('blood');
          var bkash=document.getElementById('bkash');
          var taka=document.getElementById('taka');
          var trxid=document.getElementById('trxid');

          // **** gender part Start *************************************
          var radios = document.getElementsByName("gender");
          var valid = false;
          var i = 0;
          while (!valid && i < radios.length) {
              if (radios[i].checked) valid = true;
              i++;
          }
          // image part
          var image=document.getElementById('image');

          // regular expresion

          // var mailRegex = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
          var mail_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          var regex = /^[A-Za-z\s]{4,20}$/;
          var Village_regex = /^[A-Za-z\s]{4,20}$/;
          var regex_mobile = /(^(01){1}[3456789]{1}(\d){8})$/;
          var regex_traxid = /^[A-Z0-9\s]{10}$/;


          if(name.value==''){
              document.getElementById('name_error').innerHTML="**Please Enter Your Name!**";
              name.focus();
              return false;
          }

          // if(name.value.length<4){
          //     document.getElementById('name_error').innerHTML="** Write more than 4 charactes**";
          //     name.focus();
          //     return false;
          // }

          if(!isNaN(name.value)){
              document.getElementById('name_error').innerHTML="** Only Alphabets is allowed !**";
              name.focus();
              return false;
          }
          if(regex.test(name.value) === false) {
         document.getElementById('name_error').innerHTML="** Please enter a valid Name, minimum 4  & maximum 20 Characters **";
         name.focus();
         return false;
        }
          else {
            document.getElementById('name_error').innerHTML="";
          }

          if(father_name.value==''){
              document.getElementById('father_name_error').innerHTML="**Please Enter Your father Name!**";
              father_name.focus();
              return false;
          }

          if(!isNaN(father_name.value)){
              document.getElementById('father_name_error').innerHTML="** Only Alphabets is allowed !**";
              father_name.focus();
              return false;
          }
          if(regex.test(father_name.value) === false) {
         document.getElementById('father_name_error').innerHTML="** Please enter a valid Name, minimum 4  & maximum 20 Characters **";
         father_name.focus();
         return false;
     }
      else {
          document.getElementById('father_name_error').innerHTML="";
        }

          if(mother_name.value==''){
            document.getElementById('mother_name_error').innerHTML="**Please Enter Your Mother Name!**";
              mother_name.focus();
              return false;
          }
          if(!isNaN(mother_name.value)){
              document.getElementById('mother_name_error').innerHTML="** Only Alphabets is allowed !**";
              mother_name.focus();
              return false;
          }
          if(regex.test(mother_name.value) === false) {
         document.getElementById('mother_name_error').innerHTML="** Please enter valid Name, minimum 4 & maximum 20 Characters**";
         mother_name.focus();
         return false;
     } else {
            document.getElementById('mother_name_error').innerHTML="";
          }

          if(email.value == ''){
            document.getElementById('email_error').innerHTML=" Please Enter Your Email address !";
              email.focus();
              return false;
          }

          if(email.value.indexOf('@') <=0 ){
            document.getElementById('email_error').innerHTML=" ** Please Enter Valid Email ! ** ";
              email.focus();
              return false;
          }

          if(email.value.charAt(email.value.length-4)!='.' && email.value.charAt(email.value.length-3)!='.'){
            document.getElementById('email_error').innerHTML=" ** Please Enter Valid Email ! ** ";
              email.focus();
            return false;
          }

          if(mail_regex.test(email.value) === false){
            document.getElementById('email_error').innerHTML=" ** Please Enter Valid Email ! ** ";
              email.focus();
              return false;
          }
          else {
            document.getElementById('email_error').innerHTML="";
          }

// Birthday
            function toTimestamp(strDate){
            var datum = Date.parse(strDate);
            return datum/1000;
            }

          var dob = document.getElementById('dob');
              var todayYear = new Date().getFullYear(); // Always use FullYear!!
            var cutOff14 = new Date(); // should be a Date
            cutOff14.setFullYear(todayYear - 14); // ...
            var cutOff80 = new Date();
            cutOff80.setFullYear(todayYear - 80);

            let currentDate = toTimestamp(cutOff14.toISOString().split('T')[0]);
            let lastDate = toTimestamp(cutOff80.toISOString().split('T')[0]);

              if(dob.value == ""){
                update_dob_error.innerHTML=" Please Enter your Birthday";
                return false;
              }

             if (toTimestamp(dob.value) >= currentDate) {
              update_dob_error.innerHTML = "Your Age Should be At least more than 14 Years Old";
                return false;
            }
             if (toTimestamp(dob.value) <= lastDate) {
            update_dob_error.innerHTML = "Your Age Should be At least less than 80 Years Old";
              return false;
          }
              else {
                update_dob_error.innerHTML="";
              }

// Birthday end
          if(exam.value==''){
            document.getElementById('exam_error').innerHTML="** Please Enter Your SSC Exam Year! **";
              exam.focus();
              return false;
          }
          if(isNaN(exam.value)){
              document.getElementById('exam_error').innerHTML="** Please Enter Numeric Values Only**";
              exam.focus();
              return false;
          }
        if (exam.value.length != 4) {
          document.getElementById('exam_error').innerHTML=" Year is not Valid. Please check";
          return false;
        }
        var current_year=new Date().getFullYear();
          if((exam.value < 1969) || (exam.value > current_year)){
          document.getElementById('exam_error').innerHTML="Year should be in range from 1969 to Current year";
          return false;
        }else {
            document.getElementById('exam_error').innerHTML="";
          }

          if(last_edu.value==''){
            document.getElementById('last_edu_error').innerHTML="** Please Enter Your Last Education Level! **";
              last_edu.focus();
              return false;
          }
          if(!isNaN(last_edu.value)){
              document.getElementById('last_edu_error').innerHTML="** Only Alphabets is allowed !**";
              last_edu.focus();
              return false;
          }
              if(regex.test(last_edu.value) === false) {
             document.getElementById('last_edu_error').innerHTML="** Please Enter Valid Information, minimum 4  & maximum 20 Characters **";
             last_edu.focus();
             return false;
         }else {
            document.getElementById('last_edu_error').innerHTML="";
          }

// **************************************
          if(!isNaN(village.value)){
              document.getElementById('village_error').innerHTML="** Only Alphabets is allowed !**";
              village.focus();
              return false;
          }
          if(village_regex.test(village.value) === false) {
          document.getElementById('Village_error').innerHTML="** Please enter a valid Name, minimum 4  & maximum 20 Characters **";
          village.focus();
          return false;
          }
          else {
            document.getElementById('Village_error').innerHTML="";
          }
// ****************************************
          if(mobile.value==''){
            document.getElementById('mobile_error').innerHTML="** Please Enter Your Mobile Number ! **";
              mobile.focus();
              return false;
          }

          if(regex_mobile.test(mobile.value) === false){
            document.getElementById('mobile_error').innerHTML="** Please Enter a Valid Mobile Number ! **";
              mobile.focus();
              return false;
          }else{
            document.getElementById('mobile_error').innerHTML="";
          }


          if(blood.value==''){
            document.getElementById('blood_error').innerHTML="** Please Enter Blood Group! **";
              blood.focus();
              return false;
          }else{
            document.getElementById('blood_error').innerHTML="";
          }

          if(bkash.value==''){
              document.getElementById('bkash_error').innerHTML="** Please Enter Bkash Number! **";
              bkash.focus();
              return false;
          }
          if(regex_mobile.test(bkash.value) === false){
            document.getElementById('bkash_error').innerHTML="** Please Enter a Valid Bkash Number ! **";
              bkash.focus();
              return false;
          }

          else{
            document.getElementById('bkash_error').innerHTML="";
          }

          if(taka.value==''){
              document.getElementById('taka_error').innerHTML="** Please Enter Amount Of Taka! **";

              taka.focus();
              return false;
          }else{
            document.getElementById('taka_error').innerHTML="";
          }


          if(trxid.value==''){
              document.getElementById('trxid_error').innerHTML="** Please Enter Bkash Tranjection ID! **";

              trxid.focus();
              return false;
          }
          if(regex_traxid.test(trxid.value) === false) {
         document.getElementById('trxid_error').innerHTML="** Invalid Transection ID **";
         trxid.focus();
         return false;
        }
          else{
            document.getElementById('trxid_error').innerHTML="";
          }

        if (!valid){
          document.getElementById('gender_error').innerHTML="** Please Select Your Gender! **";
        return valid;
      }else{
        document.getElementById('gender_error').innerHTML="";
      }

          if(image.value==''){
            document.getElementById('photo_error').innerHTML="Please Upload Your Photo 300<span>&times;</span>300 Pixels! And File Format must be JPG And Not more than 100 KB";
              image.focus();
              return false;
          }else{
            document.getElementById('photo_error').innerHTML="";
          }

          }
  </script>

  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>


  </body>
</html>

<?php
include("admin_footer.php");
 ?>
<!-- ************************************************ -->
<?php unset($_SESSION['errorpic']);?>
<?php unset($_SESSION['errorpicsize']);?>
