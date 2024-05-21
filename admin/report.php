<?php

require_once __DIR__ . '/../librery/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
            'default_font' => 'bangla',

            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'L',
        ]);

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/../librery/custom_bangla_font/',
    ]),
    'fontdata' => $fontData + [
        'bangla' => [
            'R' => 'Nikosh.ttf',
            'default_font_size' => 12,
            'useOTL' => 0xFF,
            // 'I' => 'FrutigerObl-Normal.ttf',
        ],

    ],
    'default_font' => 'bangla'
]);


$mpdf->SetCreator('কদমবাড়ী উচ্চ বিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২১');
//$mpdf->SetHTMLHeader('কদমবাড়ী উচ্চ বিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২১');
$mpdf->SetHTMLFooter('<div>2020 - {DATE Y} &copy; Copyright - কউবিপ্রাশিস-{DATE Y} *** Page: {PAGENO}, *** Download Time: {DATE d-m-Y, h:i A},   *** Powered By <a href="http://www.shubhamandal.com/" style="text-decoration:none;">shubhamandal.com</a></div>');

ob_start();

include("pdf.php");

$html=ob_get_clean();
$mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$file_name = 'কউবিপ্রাশিস' . " " .$date . ".pdf";
$mpdf->Output($file_name, 'I');
?>
