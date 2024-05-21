<?php
session_start();
// if(!isset($_SESSION['login'])){
// header("location:login.php");
// }
include("db.php");
include('librery/phpqrcode/qrlib.php');
include('librery/barcode/vendor/autoload.php');

 $name=$_POST['name'];
 $father_name= $_POST['father_name'];
 $mother_name=$_POST['mother_name'];
 $dob=$_POST['dob'];
 $exam=$_POST['exam'];
 $last_edu =$_POST['last_edu'];
 $last_edu_ins=$_POST['last_edu_ins'];
 $occupation=$_POST['occupation'];
 $workplace=$_POST['workplace'];
 $email=$_POST['email'];
 $mobile=$_POST['mobile'];
 $blood=$_POST['blood'];
 $gender=$_POST['gender'];
 $guests= $_POST['guests'];
 $guest_item = implode(" ",$guests);
 $captcha= $_POST['captcha'];
 $village= $_POST['village'];
 $division= $_POST['division'];
 $district= $_POST['district'];
 $thana= $_POST['thana'];
 $pvillage= $_POST['pvillage'];
 $pdivision = $_POST['pdivision'];
 $pdistrict = $_POST['pdistrict'];
 $pthana = $_POST['pthana'];

 // **************************************************************

 $sql2= "SELECT * FROM students WHERE  mobile='$mobile'";
 $result = mysqli_query($conn,$sql2);
  $rowcount=mysqli_num_rows($result);

  $uploaded_file = $_FILES['image']['tmp_name'];
list($width, $height, $type, $attr) = getimagesize($uploaded_file);

 if($rowcount == 1){
   session_start();
     $_SESSION['student_mass']=1;
     header("location:insert.php");
   }else {
     $uploaded_file = $_FILES['image'];
     $after_explode = explode('.',$uploaded_file['name']);
     $extention = end($after_explode);
     $allowed_extention = array('jpg');
     if(in_array($extention, $allowed_extention)){
       if($uploaded_file['size'] <= 100000 && ($width == 300 && $height == 300)){
         $insert_query = "INSERT INTO students(name,father_name,mother_name,dob,exam,last_edu,last_edu_ins,occupation,workplace,email,mobile,blood,gender,guest_item,captcha,village,division,district,thana,pvillage,pdivision,pdistrict,pthana,status) VALUES('$name','$father_name','$mother_name','$dob','$exam','$last_edu','$last_edu_ins','$occupation','$workplace','$email','$mobile','$blood','$gender','$guest_item','$captcha','$village','$division','$district','$thana','$pvillage','$pdivision','$pdistrict','$pthana','pending')";
         $result = mysqli_query($conn,$insert_query);
         $last_id = mysqli_insert_id($conn);
         $file_name = $last_id.'.'.$extention;
         $new_location = 'uploads/'.$file_name;
         move_uploaded_file($uploaded_file['tmp_name'], $new_location);
         $name_to_save_db = $file_name;

         // Random string generete

         // $random_string =uniqid('KHS');
         $random_string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
         $random_string = str_shuffle($random_string);
         $random_string = substr($random_string,0,8);
         // qr code
         $tempDir = "qr_code_images/";

         // $arrData = [
         //   'Name' => $name,
         //   'Father Name '=>$father_name,
         // 'Mother Name'=> $mother_name,
         //  'Mobile '=> $mobile,
         //    /* Add here all the data you need*/
         //  ];
         $codeContents = $random_string . ":". $name . ":". $father_name .":" . $mother_name .":". $email .":". $dob .":". $exam .":". $last_edu .":". $mobile .":". $blood .":". $gender .":". $guest_item;
         // $codeContents = array('Name' => $name,
         //                        'Father Name '=>$father_name,
         //                        'Mother Name'=> $mother_name,
         //                        'Mobile '=> $mobile);

         // we need to generate filename somehow,
         // with md5 or with database ID used to obtains $codeContents...

         $last_id = mysqli_insert_id($conn);
         $qr_file_Name = $last_id.'.png';

         $pngAbsoluteFilePath = $tempDir.$qr_file_Name;
         $urlRelativeFilePath = $tempDir.$qr_file_Name;
         // $custome_URL = "http://localhost/Kadambari%20PHP%20Dynamic%202/src/admin/view.php?id=$id";
         QRcode::png($codeContents, $pngAbsoluteFilePath);

         // qr code end

         // barcode start
         $barcode_file_name = $last_id.'.jpg';
         $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
         file_put_contents('barcode_images/'.$barcode_file_name, $generator->getBarcode($random_string, $generator::TYPE_CODE_128,2,80));
         // file_put_contents('barcode_images/barcode.jpg', $generator->getBarcode($fname . "/" . $lname . "/" . $mobile . "/" . $age, $generator::TYPE_CODE_128,1,100));
         // barcode end

         $update = "UPDATE students SET image='$file_name', qr_image='$qr_file_Name', barcode_image='$barcode_file_name', string='$random_string' WHERE id=$last_id";
         $photo_uploaded = mysqli_query($conn,$update);
         }else{
           $_SESSION['errorpicsize']=1;
         header("location:insert.php");
       }
      }else {
         $_SESSION['errorpic']=1;
         header("location:insert.php");
     }
     if(isset($photo_uploaded)){
       $_SESSION['success']=1;
         header("location:index.php");
     }else{
         $_SESSION['error']=1;
         header("location:insert.php");
     }
   }

?>
