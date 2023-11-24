<?php 
    require_once "config.php";
    require_once "./../../model/produit.php";
    require_once "./../../model/SmallBuisness.php";

class produitC{
    public function afficherSmallb($id_produit){
        try{
            $pdo = config::getConnexion();
            $query=$pdo->prepare("SELECT * FROM small_bs WHERE produit = :id");
            $query->execute(['id'=>$id_produit]);
            return $query->fetchALL();
         }catch (PDOExeption $e){
            echo $e ->getmessage();
        }}
    public function afficheProduit(){
        try{
            $pdo = config::getConnexion();
            $query=$pdo->prepare("SELECT * FROM produit");
            $query->execute();
            return $query->fetchALL();
         }catch (PDOExeption $e){
            echo $e->getmessage();
        }
    }    
    public function getProcuctByiD($id){
        try{
            $pdo = config::getConnexion();
            $query=$pdo->prepare("SELECT * FROM produit WHERE id_produit= :id");
            $query->bindParam(':id', $id);
        $query->execute();

        
        $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
         }catch (PDOExeption $e){
            echo $e->getmessage();
        }
    }    
    function supprimerProduit($id){
        $db = config::getConnexion();
        $sql = "DELETE FROM produit where id_produit=:id";

        try {
            $query = $db->prepare($sql);
            $query->execute(['id'=>$id]);
        }catch(Exception $e){
            $e->getMessage();
        }
    }

    }