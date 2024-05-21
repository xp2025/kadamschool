<?php
// include("../librery/fpdf182/fpdf.php");
include("../librery/dompdf/autoload.inc.php");

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

    // $dompdf->set_option('isRemoteEnabled', TRUE);


ob_start();
require_once ('indivisual.php');
$html= ob_get_clean();

$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("person_details", array("attachment"=>0));
?>
