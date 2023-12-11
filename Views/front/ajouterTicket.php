<?php
require_once('../../Controller/TicketC.php');

// Include TCPDF

// Include QRCode

$ticketC = new TicketC();
$reservations = $ticketC->afficherReservations();

if (isset($_GET["idReservation"]) && isset($_GET["matricule"]) && isset($_GET["prixTotale"])) {
    $idReservation = $_GET["idReservation"];
    $matricule = $_GET["matricule"];
    $prixTotale = $_GET["prixTotale"];

    $ticket = new Ticket(0, $idReservation, $matricule, $prixTotale);

    $ticketC->ajouterTicket($ticket);

    // Generate PDF
  //  generatePDF($ticket);
    header('Location: tickets.php?idReservation=' . $idReservation . '&matricule=' . $matricule . '&prixTotale=' . $prixTotale);
}




