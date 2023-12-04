<?php
include "../../config.php";
require_once '../../Model/Livraison.php'; 

class LivraisonC {

    function ajouterLivraison($livraison){
        $sql = "INSERT INTO livraison (idPartenaire, date, type, adresse, status, numero) 
                VALUES (:idPartenaire, :dateLivraison, :typeLivraison, :adresseLivraison, :statusLivraison, :numeroLivraison)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'idPartenaire' => $livraison->getIdPartenaire(),
                'dateLivraison' => $livraison->getDateLivraison(),
                'typeLivraison' => $livraison->getTypeLivraison(),
                'adresseLivraison' => $livraison->getAdresseLivraison(),
                'statusLivraison' => $livraison->getStatusLivraison(),
                'numeroLivraison' => $livraison->getNumeroLivraison()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
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
    

    function afficherLivraisons(){
        $sql = "SELECT l.* , t.nom FROM livraison l JOIN typelivraison t ON l.type = t.id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
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

    function supprimerLivraison($id){
        $sql = "DELETE FROM livraison WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function getLivraisonById($id){
        $sql = "SELECT * FROM livraison WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo('Erreur: ' . $e->getMessage());
        }
    }

    function modifierLivraison(Livraison $livraison){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE livraison SET 
                    idPartenaire = :idPartenaire,
                    date = :dateLivraison,
                    type = :typeLivraison,
                    adresse = :adresseLivraison,
                    status = :statusLivraison,
                    numero = :numeroLivraison
                    WHERE id = :id'
            );
            $query->execute([
                'idPartenaire' => $livraison->getIdPartenaire(),
                'dateLivraison' => $livraison->getDateLivraison(),
                'typeLivraison' => $livraison->getTypeLivraison(),
                'adresseLivraison' => $livraison->getAdresseLivraison(),
                'statusLivraison' => $livraison->getStatusLivraison(),
                'numeroLivraison' => $livraison->getNumeroLivraison(),
                'id' => $livraison->getId()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}
?>
