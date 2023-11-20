<?php
require_once('../../controller/TicketC.php');
$ticketC = new TicketC();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $ticketC->supprimerTicket($id);
}
header("Location: tickets.php");
?>
