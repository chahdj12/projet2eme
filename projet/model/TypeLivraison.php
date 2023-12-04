<?php
class TypeLivraison {
    private $id;
    private $nom;
    private $description;
    private $cible;

    // Constructeur
    public function __construct($id, $nom, $description, $cible) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->cible = $cible;
    }

    // Getter pour id
    public function getId() {
        return $this->id;
    }

    // Setter pour id
    public function setId($id) {
        $this->id = $id;
    }

    // Getter pour nom
    public function getNom() {
        return $this->nom;
    }

    // Setter pour nom
    public function setNom($nom) {
        $this->nom = $nom;
    }

    // Getter pour description
    public function getDescription() {
        return $this->description;
    }

    // Setter pour description
    public function setDescription($description) {
        $this->description = $description;
    }

    // Getter pour cible
    public function getCible() {
        return $this->cible;
    }

    // Setter pour cible
    public function setCible($cible) {
        $this->cible = $cible;
    }
}

?>