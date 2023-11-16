<?php

require '../config.php';

class typeoffreC
{

    public function listTypeOffre()
    {
        $sql = "SELECT * FROM typeoffre";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletetypeoffre($idType)
    {
        $sql = "DELETE FROM typeoffre WHERE idType = :idType";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idType', $idType);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addTypeOffre($typeoffre)
    {
        $sql = "INSERT INTO typeoffre  
        VALUES (NULL, :nomType,:Logo, :nbrOffres)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomType' => $typeoffre->getNomtype(),
                'Logo' => $typeoffre->getlogo(),
                'nbrOffres' => $typeoffre->getnbroffres()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showoffres($idType)
    {
        $sql = "SELECT * from typeoffre where idType = $idType";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $typeoffre = $query->fetch();
            return $typeoffre;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatetypeoffre($typeoffre, $idType)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE typeoffre SET 
                    nomType= :nomType, 
                    Logo= :Logo, 
                    nbrOffres = :nbrOffres
                   
                WHERE idType= :idType'
            );
            
            $query->execute([
                'idType' => $idType,
                'nomType' => $typeoffre->getNomType(),
                'Logo' => $typeoffre->getLogo(),
                'nbrOffres' => $typeoffre->getnbrOffres()        
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
