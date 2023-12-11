<?php
include "../../config.php";
require_once '../../Model/Reservation.php'; 

class ReservationC {

    function ajouterReservation($reservation){
        $sql = "INSERT INTO reservation (idUser, typePaiement, nbrPersonnes, dateDebut, dateFin, nbrChambres, typePension) 
                VALUES (:idUser ,:typePaiement, :nbrPersonnes, :dateDebut, :dateFin, :nbrChambres, :typePension)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'idUser' => $reservation->getIdUser(),
                'typePaiement' => $reservation->getTypePaiement(),
                'nbrPersonnes' => $reservation->getNbrPersonnes(),
                'dateDebut' => $reservation->getDateDebut(),
                'dateFin' => $reservation->getDateFin(),
                'nbrChambres' => $reservation->getNbrChambres(),
                'typePension' => $reservation->getTypePension()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function ajouterReservation2($reservation){
        $sql = "INSERT INTO reservation (idUser, typePaiement, nbrPersonnes, dateDebut, dateFin, nbrChambres, typePension) 
                VALUES (:idUser ,:typePaiement, :nbrPersonnes, :dateDebut, :dateFin, :nbrChambres, :typePension)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
    
            $query->execute([
                'idUser' => $reservation->getIdUser(),
                'typePaiement' => $reservation->getTypePaiement(),
                'nbrPersonnes' => $reservation->getNbrPersonnes(),
                'dateDebut' => $reservation->getDateDebut(),
                'dateFin' => $reservation->getDateFin(),
                'nbrChambres' => $reservation->getNbrChambres(),
                'typePension' => $reservation->getTypePension()
            ]);
    
            // Return the ID of the newly inserted reservation
            return $db->lastInsertId();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return null; // Or handle the error as needed
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

    function supprimerReservation($id){
        $sql = "DELETE FROM reservation WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function getReservationById($id){
        $sql = "SELECT * FROM reservation WHERE id = :id";
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

    function modifierReservation(Reservation $reservation){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reservation SET 
                    typePaiement = :typePaiement ,
                    nbrPersonnes = :nbrPersonnes ,
                    dateDebut = :dateDebut ,
                    dateFin = :dateFin ,
                    nbrChambres = :nbrChambres ,
                    typePension = :typePension
                    WHERE id = :id'
            );
            $query->execute([
                'typePaiement' => $reservation->getTypePaiement(),
                'nbrPersonnes' => $reservation->getNbrPersonnes(),
                'dateDebut' => $reservation->getDateDebut(),
                'dateFin' => $reservation->getDateFin(),
                'nbrChambres' => $reservation->getNbrChambres(),
                'typePension' => $reservation->getTypePension(),
                'id' => $reservation->getId()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}
?>
