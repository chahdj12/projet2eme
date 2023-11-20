<?php
include '../Controller/offreC.php';
$clientC = new offreC();
$clientC->deleteoffre($_GET["idoffre"]);
header('Location:listoffre.php');
