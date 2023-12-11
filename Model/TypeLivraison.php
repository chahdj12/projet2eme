<?php

class TypeLivraison {
    private $id;
    private $nom;

    // Constructeur
    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
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
}

?>
