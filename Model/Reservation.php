<?php

class Reservation {
    private $id;

    private $idUser;
    private $typePaiement;
    private $nbrPersonnes;
    private $dateDebut;
    private $dateFin;
    private $nbrChambres;
    private $typePension;

    public function __construct($id,$idUser , $typePaiement, $nbrPersonnes, $dateDebut, $dateFin, $nbrChambres, $typePension) {
        $this->id = $id;
        $this->typePaiement = $typePaiement;
        $this->nbrPersonnes = $nbrPersonnes;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->nbrChambres = $nbrChambres;
        $this->typePension = $typePension;
        $this->idUser = $idUser;
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function getTypePaiement() {
        return $this->typePaiement;
    }

    public function setTypePaiement($typePaiement) {
        $this->typePaiement = $typePaiement;
    }

    public function getNbrPersonnes() {
        return $this->nbrPersonnes;
    }

    public function setNbrPersonnes($nbrPersonnes) {
        $this->nbrPersonnes = $nbrPersonnes;
    }

    public function getDateDebut() {
        return $this->dateDebut;
    }

    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;
    }

    public function getDateFin() {
        return $this->dateFin;
    }

    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;
    }

    public function getNbrChambres() {
        return $this->nbrChambres;
    }

    public function setNbrChambres($nbrChambres) {
        $this->nbrChambres = $nbrChambres;
    }

    public function getTypePension() {
        return $this->typePension;
    }

    public function setTypePension($typePension) {
        $this->typePension = $typePension;
    }
}
?>