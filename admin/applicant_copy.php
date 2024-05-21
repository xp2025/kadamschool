<?php

session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}

include("../db.php");
// ****************************************************
$id= $_GET['id'];
$sql= "SELECT *FROM students where id = $id";
$result = mysqli_query($conn,$sql);
$std= mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon/khs.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Applicant Form</title>
</head>
<body>
    <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td height="100" align="left" valign="top" class="green">
                        <table width="100%" border="0"  cellpadding="0" cellspacing="0" class="white14bold">
                            <tbody>
                                <tr>
                                    <td height="120" align="left" valign="top" class="green">
                                        <table width="100%" border="0"  cellpadding="0" cellspacing="0" class="white14bold">
                                            <tbody>
                                                <tr>
                                                    <td bgcolor="Green" height="120">
                                                        <table width="100%" cellpadding="3" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="100%" align="center" valign="middle">
                                                                        <font color="white">
                                                                            <font size="2">
                                                                            <br>
                                                                                শিক্ষা, শান্তি ও প্রগতি
                                                                                <br>
                                                                                <font color="white">
                                                                                    <font size="4">
                                                                                        <b>
                                                                                            <p> কদমবাড়ী উচ্চবিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২০ </p>
                                                                                        </b>

                                                                                        <font color="white">
                                                                                            <font size="2">
                                                                                                <b>
                                                                                                    <a href="http://www.shubhamandal.com/" target="_blank" style="color:#fff">www.shubhamandal.com/students</a>
                                                                                                </b>

                                                                                            </font>
                                                                                        </font>
                                                                                    </font>
                                                                                </font>
                                                                            </font>
                                                                        </font>
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                </tr>
                                                <!-- next step start -->
                                                <tr>
                                                    <td width="100%" align="center" valign="middle" bgcolor="#FFFFFF">
                                                        Application Form(Applicant's Copy)
                                                        <hr>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td align="left" valign="middle" bgcolor="#FFFFFF">
                                                        <table width="100%" border="0"  cellpadding="5" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="50%" align="left" valign="middle" bgcolor="#EAEAEA">	User ID:AQ74DPPX </td>
                                                                    <td width="50%" align="left" valign="middle" bgcolor="#EAEAEA"> <span>
                                                                        Ref: 2Sa-5/Circular/Ka:O:-8/2021-2022/855, Dated:21 November,2021
                                                                    </span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- next  -->
                                                <tr>
                                                    <td height="25" align="left" valign="middle"  bgcolor="#FFFFFF">
                                                        <table width="100%" border="0" cellpadding="5" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="25%" align="center" valign="middle">
                                                                        <img src="../uploads/<?php echo $std['image']?>" width="150" height="150" border="1" alt="">
                                                                    </td>
                                                                    <td width="75%" align="center" valign="top">
                                                                        <table width="100%" border="1" cellpadding="2" cellspacing="1"  >
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Student Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        <?php echo $std['name']?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Father Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        <?php echo $std['father_name']?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Student Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        Shubha Mandal
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Student Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        Shubha Mandal
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Student Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        Shubha Mandal
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Student Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        Shubha Mandal
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Student Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        Shubha Mandal
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Student Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        Shubha Mandal
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Student Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        Shubha Mandal
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Student Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        Shubha Mandal
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="34%" align="left" valign="middle" class="black11" >
                                                                                        Student Name
                                                                                    </td>
                                                                                    <td width="66%" align="left" valign="middle" class="black11">
                                                                                        Shubha Mandal
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- next -->
                                                <tr>
                                                    <td width="100%" align="left" valign="top" bgcolor="#F5F9BD">
                                                        <table width="100%" border="1" cellpadding="2" cellspacing="1">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="25%" align="left" valign="middle">
                                                                        National ID
                                                                    </td>
                                                                    <td width="25%" align="left" valign="middle">
                                                                        1475775854
                                                                    </td>
                                                                    <td width="25%" align="left" valign="middle">
                                                                        Passport ID
                                                                    </td>
                                                                    <td width="25%" align="left" valign="middle">
                                                                        N/A
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%" align="left" valign="middle">Birth Registration</td>
                                                                    <td width="25%" align="left" valign="middle">N/A</td>
                                                                    <td width="25%" align="left" valign="middle">Employee Status</td>
                                                                    <td width="25%" align="left" valign="middle">Not Employee</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- next -->
                                                <tr>
                                                    <td width="100%" align="left" valign="top" bgcolor="white">
                                                        Address Information:
                                                    </td>
                                                </tr>
                                                <!-- address -->
                                                <tr>
                                                    <td align="left" valign="middle" bgcolor="#FFFFFF">
                                                        <table width="100%" border="1" cellpadding="2" cellspacing="1" class="black10">
                                                            <tbody>
                                                                <tr bgcolor="#CCCCCC">
                                                                    <td width="25%" align="left" valign="middle"> Mailing/Present Address</td>
                                                                    <td width="25%" align="left" valign="middle"> </td>
                                                                    <td width="25%" align="left" valign="middle"> Permanent Address</td>
                                                                    <td width="25%" align="left" valign="middle"> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%" align="left" valign="middle"> Care Of</td>
                                                                    <td width="25%" align="left" valign="middle"> Shubha Mandal </td>
                                                                    <td width="25%" align="left" valign="middle"> Care Of</td>
                                                                    <td width="25%" align="left" valign="middle"> Shubha Mandal </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%" align="left" valign="middle"> Care Of</td>
                                                                    <td width="25%" align="left" valign="middle"> Shubha Mandal </td>
                                                                    <td width="25%" align="left" valign="middle"> Care Of</td>
                                                                    <td width="25%" align="left" valign="middle"> Shubha Mandal </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%" align="left" valign="middle"> Care Of</td>
                                                                    <td width="25%" align="left" valign="middle"> Shubha Mandal </td>
                                                                    <td width="25%" align="left" valign="middle"> Care Of</td>
                                                                    <td width="25%" align="left" valign="middle"> Shubha Mandal </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%" align="left" valign="middle"> Care Of</td>
                                                                    <td width="25%" align="left" valign="middle"> Shubha Mandal </td>
                                                                    <td width="25%" align="left" valign="middle"> Care Of</td>
                                                                    <td width="25%" align="left" valign="middle"> Shubha Mandal </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- next -->
                                                <tr>
                                                    <td align="left" valign="middle" bgcolor="#FFFFFF">
                                                        Academic Qualification:
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" bgcolor="#FFFFFF">
                                                        <table width="100%" border="1" cellpadding="2" cellspacing="0" >
                                                            <tbody>
                                                                <tr bgcolor="#CCCCCC">
                                                                    <td width="30%" align="center" valign="middle" height="20">
                                                                        Examination
                                                                    </td>
                                                                    <td width="30%" align="center" valign="middle">
                                                                        Board/Institute
                                                                    </td>
                                                                    <td width="25%" align="center" valign="middle">
                                                                        Group/Subject/Degree
                                                                    </td>
                                                                    <td width="10%" align="center" valign="middle">
                                                                        Result
                                                                    </td>
                                                                    <td width="5%" align="center" valign="middle">
                                                                        Year
                                                                    </td>
                                                                    <td width="5%" align="center" valign="middle"">
                                                                        Roll
                                                                    </td>
                                                                    <td width="5%" align="center" valign="middle">
                                                                        Duration
                                                                    </td>

                                                                </tr>
                                                                <tr >
                                                                    <td width="30%" align="left" height="20" valign="middle">
                                                                        SSC
                                                                    </td>
                                                                    <td width="30%" align="left" valign="middle">
                                                                        Dhaka
                                                                    </td>
                                                                    <td width="25%" align="left" valign="middle">
                                                                        CSE
                                                                    </td>
                                                                    <td width="10%" align="left" valign="middle">
                                                                        5.00
                                                                    </td>
                                                                    <td width="5%" align="left" valign="middle">
                                                                        2019
                                                                    </td>
                                                                    <td width="5%" align="left" valign="middle">
                                                                        236184
                                                                    </td>
                                                                    <td width="5%" align="left" valign="middle">
                                                                        4
                                                                    </td>

                                                                </tr>
                                                                <tr >
                                                                    <td width="30%" align="left" height="20" valign="middle">
                                                                        SSC
                                                                    </td>
                                                                    <td width="30%" align="left" valign="middle">
                                                                        Dhaka
                                                                    </td>
                                                                    <td width="25%" align="left" valign="middle">
                                                                        CSE
                                                                    </td>
                                                                    <td width="10%" align="left" valign="middle">
                                                                        5.00
                                                                    </td>
                                                                    <td width="5%" align="left" valign="middle">
                                                                        2019
                                                                    </td>
                                                                    <td width="5%" align="left" valign="middle">
                                                                        236184
                                                                    </td>
                                                                    <td width="5%" align="left" valign="middle">
                                                                        4
                                                                    </td>

                                                                </tr>
                                                                <tr >
                                                                    <td width="30%" align="left" height="20" valign="middle">
                                                                        SSC
                                                                    </td>
                                                                    <td width="30%" align="left" valign="middle">
                                                                        Dhaka
                                                                    </td>
                                                                    <td width="25%" align="left" valign="middle">
                                                                        CSE
                                                                    </td>
                                                                    <td width="10%" align="left" valign="middle">
                                                                        5.00
                                                                    </td>
                                                                    <td width="5%" align="left" valign="middle">
                                                                        2019
                                                                    </td>
                                                                    <td width="5%" align="left" valign="middle">
                                                                        236184
                                                                    </td>
                                                                    <td width="5%" align="left" valign="middle">
                                                                        4
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- next -->
                                                <tr>
                                                    <td align="center" valign="middle" bgcolor="#FFFFFF">
                                                        ------------ *** -------------
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="middle" bgcolor="#FFFFFF">
                                                        <div align="justify">
                                                            I declare that the information provided in this form are correct, true and complete to the best of my knowledge and belief. If any information is found false, incorrect, incomplete or if any ineligibility is detected before or after the examination, any action can be taken against me by the Authority including cancellation of my candidature.
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- next -->
                                                <tr>
                                                    <td align="right" valign="middle" bgcolor="#FFFFFF">
                                                        <img src="../qr_code_images/<?php echo $std['qr_image']?>" width="150" height="150" alt="">
                                                    </td>
                                                </tr>
                                                <!-- next -->
                                                <tr>
                                                    <td align="right" valign="middle" bgcolor="#FFFFFF" >
                                                      *****   Don't Scrace ******
                                                    </td>
                                                </tr>
                                                <!-- next -->
                                                <tr>
                                                    <td align="left" valign="top" bgcolor="#FFF">
                                                        <hr>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
    </table>
    <table>

    </table>

    <script src="../js/jquery-slim.min.js" ></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
