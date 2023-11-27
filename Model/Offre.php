<?php

class Offre {
    private $id;
    private $nom;
    private $description;
    private $prix;
    private $date_debut;
    private $date_fin;
    private $localisation;
    private $type;

    // Constructor
    public function __construct($id, $nom, $description, $prix, $date_debut, $date_fin, $localisation, $type) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->localisation = $localisation;
        $this->type = $type;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getDateDebut() {
        return $this->date_debut;
    }

    public function getDateFin() {
        return $this->date_fin;
    }

    public function getLocalisation() {
        return $this->localisation;
    }

    public function getType() {
        return $this->type;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }

    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }

    public function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    public function setType($type) {
        $this->type = $type;
    }
}
?>