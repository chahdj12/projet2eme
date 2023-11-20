<?php
include '../Controller/typeoffreC.php';
$clientC = new typeoffreC();
$clientC->deletetypeoffre($_GET["idtype"]);
header('Location:listtypeoffre.php');
