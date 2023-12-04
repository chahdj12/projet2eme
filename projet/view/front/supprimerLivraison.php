<?php
require_once('../../controller/LivraisonC.php');
$livraisonC = new LivraisonC();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $livraisonC->supprimerLivraison($id);
}
header("Location: mesLivraisons.php");
?>
