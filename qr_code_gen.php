<?php
include('librery/phpqrcode/qrlib.php');
    // how to save PNG codes to server
    $tempDir = "qr_code_images/";
    $codeContents = 'Shubha Mandal Developer';

    // we need to generate filename somehow,
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = '005_file_'.md5($codeContents).'.png';

    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;

    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath);
        echo 'File generated!';
        echo '<hr />';
    } else {
        echo 'File already generated! We can use this cached file to speed up site on common codes!';
        echo '<hr />';
    }

    // displaying
    echo '<img src="'.$urlRelativeFilePath.'" />'; ?>
