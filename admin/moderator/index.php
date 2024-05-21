<?php
include("moderator_header.php");

session_start();
if(!isset($_SESSION['login'])){
header("location:../login.php");
}

include("../../db.php");
//****************************************************

$sql= "SELECT id FROM total_entry_counts ORDER BY id ";
$result = mysqli_query($conn,$sql);
$total_count= mysqli_num_rows($result);
?>

<!DOCTYPE  html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="../favicon/khs.png">
    <script src="../../librery/scanner/src/html5-qrcode.min.js"></script>
    <title>User Verify</title>
  </head>
  <body>
<div class="container-fluid bg-secondary text-white">
  <div class="container bg-info text-white">
  <div class="row">
    <div class="col-sm-4 mt-3">
      <div class="card">
        <div class="card-body ">
          <div class="">
            <h2>Scan Here</h2>
          </div>
      <div  id="reader">  </div>
      <br>
      <br>
      <div class="total_count">
        <table class="table table-bordered ">
          <tr>
            <td>Total Count</td>
            <td> <?php
               echo $total_count;
              ?>
            </td>
          </tr>
        </table>
      </div>
      </div>
      </div>
    </div>
    <div class="col-sm-8 mt-3" >
      <div><h4 class="text-center">Scan Result</h4></div>
            <div class="">
            <div class="" id="success" style="display:none">
                 <div class="alert alert-success mt-3" role="alert">
                  <strong>Success!</strong> Process Completed !!
                </div>
            </div>

            <!-- sweet allert -->

            <div class="" id="fail" style="display:none">
                 <div class="alert alert-success mt-3" role="alert" >
                  <strong>Sorry!</strong> Already Entered !!
                </div>
            </div>
            </div>

      <form  action="entry.php" name="scan_data" method="post" enctype="multipart/form-data">
            <div class="proccess text-center">
                <input type="submit" name="submit" class="btn btn-primary" value="Proced"  id='submit'>
            </div>
            <table class="table table-bordered  mt-3 text-white " >
          <tr>
              <th>Security Code</th>
              <td ><span id="security_code"></span> </td>

          </tr>
          <tr>
              <th>Student Name</th>
              <td><span id="name"></span></td>
          </tr>
  <!-- *********************************************** -->
          <tr>
              <th>Father Name</th>
              <td><span id="father_name"></span></td>
          </tr>
  <!-- *********************************************** -->
          <tr>
              <th>Mother Name</th>
              <td><span id="mother_name"></span></td>
          </tr>
  <!-- *********************************************** -->
           <tr>
              <th>Student Email</th>
              <td><span id="email"></span></td>
          </tr>
           <tr>
              <th>Date Of Birth</th>
              <td><span id="dob"></span></td>
          </tr>
  <!-- *********************************************** -->
           <tr>
              <th>SSC Exam Year</th>
              <td><span id="exam"></span></td>
          </tr>
  <!-- *********************************************** -->
           <tr>
              <th>Last Eduction Level</th>
              <td><span id="last_edu"></span></td>
          </tr>
           <tr>
              <th>Village Name</th>
              <td><span id="village"></span></td>
          </tr>
  <!-- *********************************************** -->
           <tr>
              <th>Student Mobile</th>
              <td> <span id="mobile"></span> </td>
          </tr>
  <!-- *********************************************** -->
           <tr>
              <th>Blood Group</th>
              <td><span id="blood"></span></td>
          </tr>
  <!-- *********************************************** -->
           <tr>
              <th>Gender</th>
              <td><span id="gender"></span></td>
          </tr>
           <tr>
              <th>Extra Person </th>

              <td> <input type="number" class="form-control" min="0" max="5" id="extra_person" value="0" name="extra_person"></td>

          </tr>
  <!-- *********************************************** -->
           <!-- <tr>
              <th>Student Picture</th>
               <td><span id="image"></span>   </td>
          </tr> -->
      </table>
</form>
    </div>

  </div>
  </div>
</div>

<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
  let info = qrCodeMessage.split(":")
   document.getElementById('security_code').innerHTML = '<span class="">'+info[0]+'</span>';
    document.getElementById('name').innerHTML = '<span class="">'+info[1]+'</span>';
    document.getElementById('father_name').innerHTML = '<span class="">'+info[2]+'</span>';
    document.getElementById('mother_name').innerHTML = '<span class="">'+info[3]+'</span>';
    document.getElementById('email').innerHTML = '<span class="">'+info[4]+'</span>';
    document.getElementById('dob').innerHTML = '<span class="">'+info[5]+'</span>';
    document.getElementById('exam').innerHTML = '<span class="">'+info[6]+'</span>';
    document.getElementById('last_edu').innerHTML = '<span class="">'+info[7]+'</span>';
    document.getElementById('village').innerHTML = '<span class="">'+info[8]+'</span>';
    document.getElementById('mobile').innerHTML = '<span class="">'+info[9]+'</span>';
    document.getElementById('blood').innerHTML = '<span class="">'+info[10]+'</span>';
    document.getElementById('gender').innerHTML = '<span class="">'+info[11]+'</span>';
}

function onScanError(errorMessage) {
  //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>
<!-- scanner javascript  end-->

<!-- scanner data insert javascript  start-->
<script type="text/javascript">

   window.addEventListener('DOMContentLoaded', (event) => {

     const submit = document.querySelector('#submit');
     const place = document.querySelector('#success');
     const fail = document.querySelector('#fail');

     if(submit != null){

       submit.addEventListener('click',function(e){

            let security_code = document.querySelector('#security_code').innerText;
            let name = document.querySelector('#name').innerText;
            let father_name = document.querySelector('#father_name').innerText;
            let mother_name = document.querySelector('#mother_name').innerText;
            let email = document.querySelector('#email').innerText;
            let dob = document.querySelector('#dob').innerText;
            let exam = document.querySelector('#exam').innerText;
            let last_edu = document.querySelector('#last_edu').innerText;
            let village = document.querySelector('#village').innerText;
            let mobile = document.querySelector('#mobile').innerText;
            let blood = document.querySelector('#blood').innerText;
            let gender = document.querySelector('#gender').innerText;
            let extra_person = document.getElementById('extra_person').value;

            e.preventDefault();
            if (mobile === "") {
              alert("Please Scan QR-Code !!");
              return false;
            }

             let data = {}

             data.security_code = security_code;
             data.name = name;
             data.father_name = father_name;
             data.mother_name = mother_name;
             data.email = email;
             data.dob = dob;
             data.exam = exam;
             data.last_edu = last_edu;
             data.village = village;
             data.mobile = mobile;
             data.blood = blood;
             data.gender = gender;
             data.extra_person = extra_person;

            const url = '../entry.php';

            fetch(url, {
              method: 'POST', // or 'PUT'
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
              console.log(data);

              if(data.status){
                place.style.display='block';
              }else{
                fail.style.display='block';
              }

              setTimeout(()=>{
                window.location.reload();
              },1500);

            })
            .catch((error) => {

              console.error('Error:', error);
            });

      });

    }
 });

</script>

</body>
</html>


<?php unset($_SESSION['process_complete']);?>
 <?php unset($_SESSION['process_not_complete']);?>

<?php
include("moderator_footer.php");
 ?>
