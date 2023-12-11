<?php
require_once('../../Controller/OffreC.php'); // Assuming the path to your OffreC class

$offreC = new OffreC();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $offreC->supprimerOffre($id);
}

header("Location: offres.php");
?>
