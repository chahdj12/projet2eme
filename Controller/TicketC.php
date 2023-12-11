<?php
include "../../config.php";
require_once '../../Model/Ticket.php'; // Assuming you have a Ticket class

class TicketC {

    function ajouterTicket($ticket){
        $sql = "INSERT INTO ticket (idReservation, matricule, prixTotale) 
                VALUES (:idReservation, :matricule, :prixTotale)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'idReservation' => $ticket->getIdReservation(),
                'matricule' => $ticket->getMatricule(),
                'prixTotale' => $ticket->getPrixTotale()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function afficherReservations(){
        $sql = "SELECT * FROM reservation ORDER BY dateDebut DESC LIMIT 30";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function afficherTickets(){
        $sql = "SELECT ticket.* , r.dateDebut FROM ticket  join reservation r on ticket.idReservation = r.id ORDER BY id DESC LIMIT 30 ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerTicket($id){
        $sql = "DELETE FROM ticket WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function getTicketById($id){
        $sql = "SELECT * FROM ticket WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierTicket(Ticket $ticket){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE ticket SET 
                    idReservation = :idReservation ,
                    matricule = :matricule ,
                    prixTotale = :prixTotale
                    WHERE id = :id'
            );
            $query->execute([
                'idReservation' => $ticket->getIdReservation(),
                'matricule' => $ticket->getMatricule(),
                'prixTotale' => $ticket->getPrixTotale(),
                'id' => $ticket->getId()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}
?>
