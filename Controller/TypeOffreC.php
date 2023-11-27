<?php

include "../../config.php";
require_once '../../Model/TypeOffre.php'; // Assuming the path to your TypeOffre class

class TypeOffreC {

    function ajouterTypeOffre($typeOffre) {
        $sql = "INSERT INTO typeOffre (nom, description, logo) 
                VALUES (:nom, :description, :logo)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'nom' => $typeOffre->getNom(),
                'description' => $typeOffre->getDescription(),
                'logo' => $typeOffre->getLogo()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function afficherTypesOffre() {
        $sql = "SELECT * FROM typeOffre";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerTypeOffre($id) {
        $sql = "DELETE FROM typeOffre WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function getTypeOffreById($id) {
        $sql = "SELECT * FROM typeOffre WHERE id = :id";
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

    function modifierTypeOffre(TypeOffre $typeOffre) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE typeOffre SET 
                    nom = :nom,
                    description = :description,
                    logo = :logo
                    WHERE id = :id'
            );
            $query->execute([
                'nom' => $typeOffre->getNom(),
                'description' => $typeOffre->getDescription(),
                'logo' => $typeOffre->getLogo(),
                'id' => $typeOffre->getId()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}
?>
