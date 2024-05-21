<?php
session_start();
include("header.php");
include("db.php");
 ?>
<header id="contact-header">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto text-center text-light">
          <h1 class="text-light"><i class="fa fa-send fa-spin" style="font-size:30px"></i> Contact Us</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, saepe.</p>
        </div>
      </div>
    </div>
  </header>
  <!-- Contact Section -->
  <section id="contact" class="py-5 bg-secondary">
    <div class="container">
      <div class="row pt-5">
        <div class="col-md-8">
          <div class="row">
  <div class="">
    <?php if(isset($_SESSION['contact_error'])) { ?>
       <div class="alert alert-success mt-3" role="alert">
        <strong>Soory!</strong> Your Messeage  not send successfully. Please Try Again!
      </div>
    <?php }?>
  </div>

  <div class="">
    <?php if(isset($_SESSION['contact_success'])) { ?>
       <div class="alert alert-success mt-3" role="alert">
        <strong>Success!</strong> Thank you For Contact.
      </div>
    <?php }?>
  </div>
</div>
    <div class="card">
      <div class="card-body">
        <form  action="contact_confirm.php" method="POST" onsubmit="return valid()">
          <h4 class="mb-4 text-center">Please fill out this form to contact us</h4>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="fname">First Name</label>
                    <input type="text" placeholder="Write Your First Name" class="form-control" id="fname" name="fname">
                    <p class="input_sms text-danger" id="fname_error"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" placeholder="Write Your Last Name" class="form-control" id="lname" name="lname">
                    <p class="input_sms text-danger" id="lname_error"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Write Your Email" class="form-control" id="email" name="email">
                    <p class="input_sms text-danger" id="email_error"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mobile">Phone Number</label>
                    <input type="text" placeholder="Write Your Phone Number" class="form-control" id="mobile" name="mobile">
                      <p class="input_sms text-danger" id="mobile_error"></p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="subject">Message</label>
                    <textarea cols="30" rows="5" placeholder="Write Your Message" class="form-control" id="subject" name="subject"></textarea>
                      <p class="input_sms text-danger" id="subject_error"></p>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn  btn-block btn-dark" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"> Send</i></button>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h4>Get In Touch</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consequuntur.</p>
              <!-- <h4>Address</h4>
              <p>Dhaka, Bangladesh</p> -->
              <h4>Email</h4>
              <p>shubhamandal70@gmail.com</p>
              <h4>Phone</h4>
              <p class="mb-2">+8801822823912</p>
              <p>+8801515275159</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include("footer.php");
   ?>
<!-- validation section javascript -->
<script type="text/javascript">
    function valid(){
        var fname=document.getElementById('fname');
        var lname=document.getElementById('lname');
        var mobile=document.getElementById('mobile');
        var email=document.getElementById('email');
        var subject=document.getElementById('subject');
        var regex = /^[A-Za-z\s]{4,10}$/;
        var regex_mobile = /(^(01){1}[3456789]{1}(\d){8})$/;
        var sms = /^[A-Za-z0-9\s]{4,100}$/;
        if(fname.value==''){
            document.getElementById('fname_error').innerHTML="** Please Enter Your First Name!**";
            fname.focus();
            return false;
        }

        if(!isNaN(fname.value)){
            document.getElementById('fname_error').innerHTML="** Only Alphabets is allowed !**";
            fname.focus();
            return false;
        }

        if(regex.test(fname.value) === false) {
       document.getElementById('fname_error').innerHTML="Please Enter a valid Name.";
       fname.focus();
       return false;
        }
        else {
          document.getElementById('fname_error').innerHTML="";
        }

        if(lname.value==''){
            document.getElementById('lname_error').innerHTML="** Please Enter Your Last Name! **";
            lname.focus();
            return false;
        }
        if(!isNaN(lname.value)){
            document.getElementById('lname_error').innerHTML="** Only Alphabets is allowed !**";
            lname.focus();
            return false;
        }
        if(regex.test(lname.value) === false) {
           document.getElementById('lname_error').innerHTML="** Please Enter a valid Name.**";
           lname.focus();
           return false;
        }
        else {
          document.getElementById('lname').innerHTML="";
        }

        if(email.value==''){
          document.getElementById('email_error').innerHTML="** Please Enter Your Email! **";
            email.focus();
            return false;
        }else{
          document.getElementById('email_error').innerHTML="";
        }

        if(mobile.value==''){
          document.getElementById('mobile_error').innerHTML="** Please Enter Your Mobile! **";
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

        if(subject.value==''){
          document.getElementById('subject_error').innerHTML="** Please Write your Messeage! **";

            subject.focus();
            return false;
        }

        if(sms.test(subject.value) === false) {
           document.getElementById('subject_error').innerHTML="** Only Alphabets and Number is allowed **";
           subject.focus();
           return false;
        }

        else{
          document.getElementById('subject_error').innerHTML="";
        }

    //   if (!valid){
    //     document.getElementById('gender_error').innerHTML="** Please Select Your Gender! **";
    //   return valid;
    // }else{
    //   document.getElementById('gender_error').innerHTML="";
    // }
    //
    //     if(image.value==''){
    //       document.getElementById('photo_error').innerHTML="Please Enter Your Photo 300<span>&times;</span>300 Pixels! And File Format must be JPG And Not more than 100 KB";
    //         image.focus();
    //         return false;
    //     }else{
    //       document.getElementById('photo_error').innerHTML="";
    //     }

        }
</script>
<!-- **************************************************** -->

<?php unset($_SESSION['contact_success']);?>
<?php unset($_SESSION['contact_error']);?>
