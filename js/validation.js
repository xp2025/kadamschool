<script type="text/javascript">

    function valid2(){
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
        var capcha=document.getElementById('capcha');
        var capcha_code=document.getElementById('capcha_code');

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
        var village_regex = /^[A-Za-z\s]{4,20}$/;
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
              dob_error.innerHTML=" Please Enter your Birthday";
              return false;
            }

           if (toTimestamp(dob.value) >= currentDate) {
            dob_error.innerHTML = "Your Age Should be At least more than 14 Years Old";
              return false;
          }
           if (toTimestamp(dob.value) <= lastDate) {
          dob_error.innerHTML = "Your Age Should be At least less than 80 Years Old";
            return false;
        }
            else {
              dob_error.innerHTML="";
            }


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

        if(village.value==''){
          document.getElementById('village_error').innerHTML="** Please Enter Your Village Name ! **";
            village.focus();
            return false;
        }

        if(!isNaN(village.value)){
            document.getElementById('village_error').innerHTML="** Only Alphabets is allowed !**";
            village.focus();
            return false;
        }
        if(village_regex.test(village.value) === false) {
        document.getElementById('village_error').innerHTML="** Please enter a valid Name, minimum 4  & maximum 20 Characters **";
        village.focus();
        return false;
        }
        else {
          document.getElementById('village_error').innerHTML="";
        }

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

    if(capcha.value==''){
        document.getElementById('capcha_error').innerHTML="** Please Enter Captcha Code **";
        capcha.focus();
        return false;
    }
    if(capcha_code.value != capcha.value) {
   document.getElementById('capcha_error').innerHTML="** Invalid Captcha Code **";
   capcha.focus();
   return false;
  }
    // else{
    //   document.getElementById('capcha_error').innerHTML="";
    // }

        if(image.value==''){
          document.getElementById('photo_error').innerHTML="Please Upload Your Photo 300<span>&times;</span>300 Pixels! And File Format must be JPG And Not more than 100 KB";
            image.focus();
            return false;
        }else{
          document.getElementById('photo_error').innerHTML="";
        }
      }

</script>
