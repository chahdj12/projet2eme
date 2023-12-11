<?php
require_once('../../controller/TypeLivraisonC.php');
$typeLivraisonC = new TypeLivraisonC();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $typeLivraisonC->supprimerTypeLivraison($id);
}
header("Location: typelivraisons.php");
?>
