<?php
require_once('../../controller/LivraisonC.php');
$livraisonC = new LivraisonC();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $livraisonC->supprimerLivraison($id);
    $email_user = 'the.cursed.fool.of.pleasure@gmail.com';
	require('sendmail.php');
}
header("Location: livraisons.php");
?>
