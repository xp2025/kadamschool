<?php
session_start();
// include("admin_header.php");
include("../db.php");


if(!isset($_SESSION['login'])){
header("location:login.php");
}

// ******** Important *******************
$sql= "SELECT * FROM students";
$result = mysqli_query($conn,$sql);


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <title>Kadambari High School's Student List</title>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="/cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>


</head>
<body>
<h2 style="text-align: center;padding:10px 0;">Kadambari High School's Student List</h2>

<table class="display nowrap table table-striped table-bordered text-center" id="myTable" style="width:90%">
    <thead>
        <th>Name</th>
        <th>Father Name</th>
        <th>Mother Name</th>
        <th >Email</th>
        <th>SSC Year</th>
        <th>Edu Level</th>
        <th>Mobile No</th>
        <th>Blood Group</th>
        <th>Image</th>
    </thead>
    <tbody>
       <?php while($row = mysqli_fetch_assoc($result)) {?>
        <tr width="60px" heidth="40px">

            <td ><?= $row['name']?></td>
            <td ><?= $row['father_name']?></td>
            <td ><?= $row['mother_name']?></td>
            <td ><?= $row['email']?></td>
            <td ><?= $row['exam']?></td>
            <td ><?= $row['last_edu']?></td>
            <td ><?= $row['mobile']?></td>
            <td ><?= $row['blood']?></td>

            <td > <img src="../uploads/<?= $row['image']?>" width="50">  </td>


        </tr>
       <?php }?>



    </tbody>
</table>



<script>
$(document).ready(function() {
    $('#myTable').DataTable( {
      responsive: true,
      fixedHeader: true,

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</body>
</html>
