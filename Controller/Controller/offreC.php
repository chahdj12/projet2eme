<?php

require '../config.php';

class offreC
{

    public function listoffre()
    {
        $sql = "SELECT * FROM offre";
        $db = config::getConnexion();
        try {
            $liste= $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteoffre($idoffre)
    {
        $sql = "DELETE FROM offre WHERE idoffre = :idoffre";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idoffre', $idoffre);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addoffre($offre)
    {
        $sql = "INSERT INTO offre
        VALUES (NULL, :descoffre,:localoffre,:typeoffre)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'descoffre' => $offre->getdescoffre(),
                'localoffre' => $offre->getlocaloffre(),
                'typeoffre' => $offre->gettypeoffre()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showoffre($idoffre)
    {
        $sql = "SELECT * from offre where idoffre = $idoffre";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $offre = $query->fetch();
            return $offre;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateoffre($offre, $idoffre)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE offre SET 
                    descoffre = :descoffre,  
                    localoffre = :localoffre, 
                    typeoffre = :typeoffre
                WHERE idoffre= :idoffre'
            );
            
            $query->execute([
                'idoffre' => $idoffre,
                'descoffre' => $offre->getdescoffre(),
                'localoffre' => $offre->getlocaloffre(),
                'typeoffre' => $offre->gettypeoffre()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
