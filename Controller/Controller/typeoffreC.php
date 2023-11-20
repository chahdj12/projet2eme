<?php

require '../config.php';

class typeoffreC
{

    public function listtypeoffre()
    {
        $sql = "SELECT * FROM typeoffre";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function afficheoffres($idtype)
    {
        try{
            $pdo = config::getConnexion();
            $query=$pdo->prepare("SELECT * FROM offre WHERE typeoffre = :idtype");
            $query->execute(['idtype'->$idtype]);
            return $query->fetchAll();
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function affichetype(){
        try{
            $pdo = config::getConnexion();
            $query=$pdo->prepare("SELECT * FROM typeoffre");
            $query->execute();
            return $query->fetchAll();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    function deletetypeoffre($idtype)
    {
        $sql = "DELETE FROM typeoffre WHERE idtype = :idtype";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idtype', $idtype);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addtypeoffre($typeoffre)
    {
        $sql = "INSERT INTO typeoffre
        VALUES (NULL, :nomtype,:logo,:nbroffres)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomtype' => $typeoffre->getnomtype(),
                'logo' => $typeoffre->getlogo(),
                'nbroffres' => $typeoffre->getnbroffres()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showtypeoffre($idtype)
    {
        $sql = "SELECT * from typeoffre where idtype = $idtype";
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

    function updatetypeoffre($typeoffre, $idtype)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE typeoffre SET 
                    nom = :nom,  
                    logo = :logo, 
                    nbroffres = :nbroffres
                WHERE idtype= :idtype'
            );
            
            $query->execute([
                'idtype' => $idtype,
                'nom' => $typeoffre->getnomtype(),
                'logo' => $typeoffre->getlogo(),
                'nbroffres' => $typeoffre->getnbroffres()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
