<?php
include "../../config.php";
require_once '../../Model/TypeLivraison.php'; 

class TypeLivraisonC {

    function ajouterTypeLivraison($typeLivraison){
        $sql = "INSERT INTO typeLivraison (nom, description, cible) VALUES (:nom, :description, :cible)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'nom' => $typeLivraison->getNom(),
                'description' => $typeLivraison->getDescription(),
                'cible' => $typeLivraison->getCible()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function afficherTypesLivraison(){
        $sql = "SELECT * FROM typeLivraison ORDER BY id DESC LIMIT 30";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    
    function afficherTypesLivraisonAvecNombreLivraisons(){
        $sql = "SELECT tl.*, COUNT(l.id) AS nombreLivraisons 
                FROM typeLivraison tl 
                LEFT JOIN livraison l ON tl.id = l.type 
                GROUP BY tl.id 
                ORDER BY tl.id DESC LIMIT 30";
    
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerTypeLivraison($id){
        $sql = "DELETE FROM typeLivraison WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function getTypeLivraisonById($id){
        $sql = "SELECT * FROM typeLivraison WHERE id = :id";
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
    function modifierTypeLivraison(TypeLivraison $typeLivraison){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE typeLivraison SET 
                    nom = :nom,
                    description = :description,
                    cible = :cible
                    WHERE id = :id'
            );
            $query->execute([
                'nom' => $typeLivraison->getNom(),
                'description' => $typeLivraison->getDescription(),
                'cible' => $typeLivraison->getCible(),
                'id' => $typeLivraison->getId()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}
?>
