<?php

session_start();
if(!isset($_SESSION['login'])){
header("location:login.php");
}
include("admin_header.php");
include("../db.php");
// ****************************************************
$id= $_GET['id'];
$sql= "SELECT *FROM students where id = $id";
$result = mysqli_query($conn,$sql);
$std= mysqli_fetch_assoc($result);
?>
<!-- ******************************************************************* -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="../favicon/khs.png">
    <title>All View</title>
</head>

<body>
    <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td height="100" align="left" valign="top" class="green">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="white14bold">
                        <tbody>
                            <tr>
                                <td height="120" align="left" valign="top" class="green">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="white14bold">
                                        <tbody>
                                            <tr>
                                                <td bgcolor="Green" height="120">
                                                    <table width="100%" cellpadding="3" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="100%" align="center" valign="middle">
                                                                    <font color="white">
                                                                        <font size="4">
                                                                            কদমবাড়ী উচ্চবিদ্যালয় প্রাক্তন শিক্ষার্থী
                                                                            সম্মিলন ২০২০
                                                                            <br>
                                                                            <!-- <font color="white">
                                                                                    <font size="4">
                                                                                        <b>
                                                                                            Taxes Zone-8, Dhaka
                                                                                        </b>
                                                                                        <br>
                                                                                        <font color="white">
                                                                                            <font size="2">
                                                                                                <b>
                                                                                                    <a href="https://taxeszone8dhaka.gov.bd/" target="_blank" style="color:#fff">www.taxeszone8dhaka.gov.bd</a>
                                                                                                </b>
                                                                                                <br>

                                                                                            </font>
                                                                                        </font>
                                                                                    </font>
                                                                                </font> -->
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
                                                    <table width="100%" border="0" cellpadding="5" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <th width="50%" align="left" valign="middle"
                                                                    bgcolor="#EAEAEA"> User ID:
                                                                    <?php echo $std['string']?> </th>
                                                                <td width="50%" align="left" valign="middle"
                                                                    bgcolor="#EAEAEA"> <span>
                                                                        Ref: 2Sa-5/Circular/Ka:O:-8/2021-2022/855,
                                                                        Dated:21 November,2021
                                                                    </span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!-- next  -->
                                            <tr>
                                                <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">
                                                    <table width="100%" border="0" cellpadding="2" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="25%" align="center" valign="middle">
                                                                    <!-- <img src="11.jpg" width="150" height="150" border="1" alt=""> -->
                                                                    <img class="applicant-image"
                                                                        src="../uploads/<?php echo $std['image']?>"
                                                                        width="160" height="150" border="1"
                                                                        alt="Aplicant Image">
                                                                    <br>
                                                                    <br>
                                                                    <img class="applicant-barcode_image"
                                                                        src="../barcode_images/<?php echo $std['barcode_image']?>"
                                                                        width="160px" height="10px">
                                                                </td>
                                                                <td width="75%" align="center" valign="top">
                                                                    <table width="100%" border="1" cellpadding="2"
                                                                        cellspacing="1">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Student Name
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo $std['name']?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Father Name
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo $std['father_name']?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Mother's Name
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo $std['mother_name']?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Student Email
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo $std['email']?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Date Of Birth
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo date('d-M-Y',strtotime($std['dob']));?>
                                                                                    <?php $bday = date_create($std["dob"]); $submit_day = date_create(date('d-m-Y',strtotime($std["date"])));  $age = date_diff($submit_day,$bday); echo "[ ".$age ->y." " ."Years " ; echo $age->m ." " ."Months "; echo $age->d ." " ."Days ]"; ?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    SSC Passing Year
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo $std['exam']?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Last Eduction Level
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo $std['last_edu']?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Village Name
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo $std['village']?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Student's Mobile No
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo $std['mobile']?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Blood Group
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo $std['blood']?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Gender
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo $std['gender']?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="34%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    Apply Date
                                                                                </th>
                                                                                <td width="66%" align="left"
                                                                                    valign="middle"
                                                                                    class="black11 pl-2">
                                                                                    <?php echo date('d-M-y h:i A',strtotime($std["date"]));?>
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
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2">
                                                                    National ID
                                                                </td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2">
                                                                    1475775854
                                                                </td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2">
                                                                    Passport ID
                                                                </td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2">
                                                                    N/A
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2">
                                                                    Birth Registration </td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2">
                                                                    N/A
                                                                </td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2">
                                                                    Merital status
                                                                </td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2">
                                                                    Single
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!-- next -->
                                            <tr>
                                                <th width="100%" align="left" valign="top" bgcolor="white">
                                                    Address Information:
                                                </th>
                                            </tr>
                                            <!-- address -->
                                            <tr>
                                                <td align="left" valign="middle" bgcolor="#FFFFFF">
                                                    <table width="100%" border="1" cellpadding="2" cellspacing="1"
                                                        class="black10">
                                                        <tbody>
                                                            <tr bgcolor="#CCCCCC">
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2"> Mailing/Present Address</td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2"> </td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2"> Permanent Address</td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2"> </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2"> Care Of</td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2"> <?php echo $std['father_name']?></td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2"> Care Of </td>
                                                                <td width="25%" align="left" valign="middle"
                                                                    class=" pl-2"> <?php echo $std['father_name']?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%" align="left" valign="middle"> Village
                                                                </td>
                                                                <td width="25%" align="left" valign="middle">
                                                                    <?php echo $std['village']?> </td>
                                                                <td width="25%" align="left" valign="middle"> Village
                                                                </td>
                                                                <td width="25%" align="left" valign="middle">
                                                                    <?php echo $std['village']?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%" align="left" valign="middle"> Care Of
                                                                </td>
                                                                <td width="25%" align="left" valign="middle"> Shubha
                                                                    Mandal </td>
                                                                <td width="25%" align="left" valign="middle"> Care Of
                                                                </td>
                                                                <td width="25%" align="left" valign="middle"> Shubha
                                                                    Mandal </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%" align="left" valign="middle"> Care Of
                                                                </td>
                                                                <td width="25%" align="left" valign="middle"> Shubha
                                                                    Mandal </td>
                                                                <td width="25%" align="left" valign="middle"> Care Of
                                                                </td>
                                                                <td width="25%" align="left" valign="middle"> Shubha
                                                                    Mandal </td>
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
                                                    <table width="100%" border="1" cellpadding="2" cellspacing="0">
                                                        <tbody>
                                                            <tr bgcolor="#CCCCCC">
                                                                <td width="30%" align="center" valign="middle"
                                                                    height="20">
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
                                                                    <td width=" 5%" align="center" valign="middle">
                                                                    Duration
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td width="30%" align="left" height="20"
                                                                    valign="middle">
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
                                                            <tr>
                                                                <td width="30%" align="left" height="20"
                                                                    valign="middle">
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
                                                            <tr>
                                                                <td width="30%" align="left" height="20"
                                                                    valign="middle">
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
                                                        I declare that the information provided in this form are
                                                        correct, true and complete to the best of my knowledge and
                                                        belief. If any information is found false, incorrect, incomplete
                                                        or if any ineligibility is detected before or after the
                                                        examination, any action can be taken against me by the Authority
                                                        including cancellation of my candidature.
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- next -->
                                            <tr>
                                                <td align="right" valign="middle" bgcolor="#FFFFFF">
                                                    <img src="../qr_code_images/<?php echo $std['qr_image']?>"
                                                        width="150" height="150" alt="">
                                                </td>
                                            </tr>
                                            <!-- next -->
                                            <tr>
                                                <td align="right" valign="middle" bgcolor="#FFFFFF">
                                                    ***** Don't Scrace ******
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
</body>

</html>
