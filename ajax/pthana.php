<?php

include("../db.php");

$pthana_id = $_POST['pthana_data'];

$pthana_qry = " SELECT * FROM upazilas WHERE district_id =$pthana_id ORDER BY name ASC";
$pthana_res = mysqli_query($conn, $pthana_qry);

$pthana_output = '<option value=" " selected disabled>Select Upzila</option>';

while ($pthana_row = mysqli_fetch_assoc($pthana_res)) {
  $pthana_output .= '<option value="'.$pthana_row['id'].'">'.$pthana_row['name'].'</option>';
}
echo $pthana_output;

?>
