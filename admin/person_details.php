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
            'default_font_size' => 0,
            'useOTL' => 0xFF,
            // 'I' => 'FrutigerObl-Normal.ttf',
        ],

    ],
    'default_font' => 'bangla'
]);


$mpdf->SetCreator('কদমবাড়ী উচ্চ বিদ্যালয় প্রাক্তন শিক্ষার্থী সম্মিলন ২০২২');
$mpdf->SetHTMLFooter('<div>Copyright &copy; কউবিপ্রাশিস-২০২২  Download Time: {DATE d-m-Y, h:i A}. <br> Powered By <a href="http://www.shubhamandal.com/" style="text-decoration:none;">shubhamandal.com</a> </div>');

ob_start();

include('indivisual.php');

$html = ob_get_clean();
$mpdf->WriteHTML($html);
$file_name = $std['name'] . "_". $std['id'] . ".pdf";
$mpdf->Output($file_name, 'I');
?>
