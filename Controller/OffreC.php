<?php

include "../../config.php";
require_once '../../Model/Offre.php'; // Assuming the path to your Offre class

class OffreC {

    function ajouterOffre($offre) {
        $sql = "INSERT INTO offre (nom, description, prix, date_debut, date_fin, localisation, type_id) 
                VALUES (:nom, :description, :prix, :date_debut, :date_fin, :localisation, :type)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'nom' => $offre->getNom(),
                'description' => $offre->getDescription(),
                'prix' => $offre->getPrix(),
                'date_debut' => $offre->getDateDebut(),
                'date_fin' => $offre->getDateFin(),
                'localisation' => $offre->getLocalisation(),
                'type' => $offre->getType()
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


    function afficherOffres() {
        $sql = "SELECT offre.*, typeOffre.nom as type_nom, typeOffre.logo as logo
                FROM offre
                LEFT JOIN typeOffre ON offre.type_id = typeOffre.id";
    
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function afficherOffresRecherche($search = "")
    {
        $sql = "SELECT offre.*, typeOffre.nom as type_nom, typeOffre.logo as logo
                FROM offre
                LEFT JOIN typeOffre ON offre.type_id = typeOffre.id";
        
        if (!empty($search)) {
            $sql .= " WHERE offre.nom LIKE '%$search%'";
        }

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    

    function supprimerOffre($id) {
        $sql = "DELETE FROM offre WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function getOffreById($id) {
        $sql = "SELECT * FROM offre WHERE id = :id";
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

    function modifierOffre(Offre $offre) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE offre SET 
                    nom = :nom,
                    description = :description,
                    prix = :prix,
                    date_debut = :date_debut,
                    date_fin = :date_fin,
                    localisation = :localisation,
                    type_id = :type
                    WHERE id = :id'
            );
            $query->execute([
                'nom' => $offre->getNom(),
                'description' => $offre->getDescription(),
                'prix' => $offre->getPrix(),
                'date_debut' => $offre->getDateDebut(),
                'date_fin' => $offre->getDateFin(),
                'localisation' => $offre->getLocalisation(),
                'type' => $offre->getType(),
                'id' => $offre->getId()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function likeOffre($idUser, $idOffre)
    {
        $db = config::getConnexion();
        $sql = "INSERT INTO likes (idUser, idOffre) VALUES (:idUser, :idOffre)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':idOffre', $idOffre, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function dislikeOffre($idUser, $idOffre)
    {
        $db = config::getConnexion();
        $sql = "DELETE FROM likes WHERE idUser = :idUser AND idOffre = :idOffre";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':idOffre', $idOffre, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function isLiked($idUser, $idOffre)
    {
        $db = config::getConnexion();
        $sql = "SELECT COUNT(*) FROM likes WHERE idUser = :idUser AND idOffre = :idOffre";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':idOffre', $idOffre, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    public function afficherLikedOffres($idUser)
{
    $db = config::getConnexion();
    $sql = "SELECT offre.*, typeOffre.nom as type_nom, typeOffre.logo as logo
            FROM offre
            INNER JOIN likes ON offre.id = likes.idOffre
            LEFT JOIN typeOffre ON offre.type_id = typeOffre.id
            WHERE likes.idUser = :idUser";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}


    public function getLikeCount($offreId)
    {
        $db = config::getConnexion();
        $sql = "SELECT COUNT(*) FROM likes WHERE idOffre = :idOffre";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idOffre', $offreId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
?>
