<?php
include "../../config.php";
require_once '../../Model/TypeLivraison.php'; 

class TypeLivraisonC {

    function ajouterTypeLivraison($typeLivraison){
        $sql = "INSERT INTO typeLivraison (id, nom) VALUES (:id, :nom)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'id' => $typeLivraison->getId(),
                'nom' => $typeLivraison->getNom(),
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
                    nom = :nom
                    WHERE id = :id'
            );
            $query->execute([
                'nom' => $typeLivraison->getNom(),
                'id' => $typeLivraison->getId()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}
?>
