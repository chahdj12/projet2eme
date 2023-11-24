<?php
include "../../controller/produitC.php";
$produitC = new produitC();


if(isset($_GET['deleteid'])){
$produitC->supprimerProduit($_GET['deleteid']);
header('location: listProduit.php');

}
?>