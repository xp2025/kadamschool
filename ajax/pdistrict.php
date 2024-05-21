<?php

include("../db.php");

$pdivision_id = $_POST['pdivision_data'];

$pdistrict_qry = " SELECT * FROM districts WHERE division_id =$pdivision_id ORDER BY name ASC ";
$pdistrict_res = mysqli_query($conn, $pdistrict_qry);

$pdistrict_output = '<option value=" " selected disabled>Select District</option>';

while ($pdistrict_row = mysqli_fetch_assoc($pdistrict_res)) {
  $pdistrict_output .= '<option value="'.$pdistrict_row['id'].'">'.$pdistrict_row['name'].'</option>';
}
echo $pdistrict_output;

?>
