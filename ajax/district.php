<?php

include("../db.php");

$division_id = $_POST['division_data'];

$district_qry = " SELECT * FROM districts WHERE division_id =$division_id ORDER BY name ASC ";
$district_res = mysqli_query($conn, $district_qry);

$district_output = '<option value=" " selected disabled>Select District</option>';

while ($district_row = mysqli_fetch_assoc($district_res)) {
  $district_output .= '<option value="'.$district_row['id'].'">'.$district_row['name'].'</option>';
}
echo $district_output;

?>
