<?php

include("../db.php");

$district_id = $_POST['district_data'];

$thana_qry = " SELECT * FROM upazilas WHERE district_id =$district_id ORDER BY name ASC";
$thana_res = mysqli_query($conn, $thana_qry);

$thana_output = '<option value=" " selected disabled>Select Upzila</option>';

while ($thana_row = mysqli_fetch_assoc($thana_res)) {
  $thana_output .= '<option value="'.$thana_row['id'].'">'.$thana_row['name'].'</option>';
}
echo $thana_output;

?>
