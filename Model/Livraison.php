<?php
class Livraison {
    private $id;
    private $idPartenaire;
    private $dateLivraison;
    private $typeLivraison;
    private $adresseLivraison;
    private $statusLivraison;
    private $numeroLivraison;

    public function __construct($id, $idPartenaire, $dateLivraison, $typeLivraison, $adresseLivraison, $statusLivraison, $numeroLivraison) {
        $this->id = $id;
        $this->idPartenaire = $idPartenaire;
        $this->dateLivraison = $dateLivraison;
        $this->typeLivraison = $typeLivraison;
        $this->adresseLivraison = $adresseLivraison;
        $this->statusLivraison = $statusLivraison;
        $this->numeroLivraison = $numeroLivraison;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdPartenaire() {
        return $this->idPartenaire;
    }

    public function getDateLivraison() {
        return $this->dateLivraison;
    }

    public function getTypeLivraison() {
        return $this->typeLivraison;
    }

    public function getAdresseLivraison() {
        return $this->adresseLivraison;
    }

    public function getStatusLivraison() {
        return $this->statusLivraison;
    }

    public function getNumeroLivraison() {
        return $this->numeroLivraison;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdPartenaire($idPartenaire) {
        $this->idPartenaire = $idPartenaire;
    }

    public function setDateLivraison($dateLivraison) {
        $this->dateLivraison = $dateLivraison;
    }

    public function setTypeLivraison($typeLivraison) {
        $this->typeLivraison = $typeLivraison;
    }

    public function setAdresseLivraison($adresseLivraison) {
        $this->adresseLivraison = $adresseLivraison;
    }

    public function setStatusLivraison($statusLivraison) {
        $this->statusLivraison = $statusLivraison;
    }

    public function setNumeroLivraison($numeroLivraison) {
        $this->numeroLivraison = $numeroLivraison;
    }
}
?>