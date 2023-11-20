<?php
require_once('../../controller/ReservationC.php');
$reservationC = new ReservationC();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $reservationC->supprimerReservation($id);
}
header("Location: reservations.php");
?>
