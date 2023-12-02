<?php

use Dompdf\Dompdf;
use Dompdf\Options;

ob_start();
require_once "pdfContent.php";
require_once "./../../vendor/autoload.php";
$html=ob_get_contents();
ob_end_clean();


$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4','Paysage');
$dompdf->render();
$dompdf->stream('output.pdf', array('Attachment' => false));



?>