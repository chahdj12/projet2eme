<?php
require_once('../../controller/LivraisonC.php');
$livraisonC = new LivraisonC();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    echo ''.$id.'';
    $livraisonC->supprimerLivraison($id);
}
header("Location: livraisons.php");
?>
