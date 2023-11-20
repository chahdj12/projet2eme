<?php

class Ticket {
    private $id;
    private $idReservation;
    private $matricule;
    private $prixTotale;

    public function __construct($id, $idReservation, $matricule, $prixTotale) {
        $this->id = $id;
        $this->idReservation = $idReservation;
        $this->matricule = $matricule;
        $this->prixTotale = $prixTotale;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdReservation() {
        return $this->idReservation;
    }

    public function setIdReservation($idReservation) {
        $this->idReservation = $idReservation;
    }

    public function getMatricule() {
        return $this->matricule;
    }

    public function setMatricule($matricule) {
        $this->matricule = $matricule;
    }

    public function getPrixTotale() {
        return $this->prixTotale;
    }

    public function setPrixTotale($prixTotale) {
        $this->prixTotale = $prixTotale;
    }
}
?>