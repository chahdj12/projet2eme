<?php
include "../../controller/SmallBController.php";
$smallBController = new SmallBController();


if(isset($_GET['deleteid'])){
$smallBController->supprimersmallB($_GET['deleteid']);
header('location: listSmallBuisness.php');

}
?>