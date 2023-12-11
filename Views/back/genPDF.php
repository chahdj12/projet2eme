<?php

use Dompdf\Dompdf;
use Dompdf\Options;//classes Dompdf nécessaires pour générer le PDF

ob_start();
require_once "pdfContent.php";// le contenu HTML à convertir en PDF.
require_once "./../../vendor/autoload.php"; //le fichier d'autoloader
$html=ob_get_contents();
ob_end_clean();


$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4','Paysage');
$dompdf->render();
$dompdf->stream('output.pdf', array('Attachment' => false));//"Attachment" désactivée ne pas traiter le PDF comme une pièce jointe.



?>