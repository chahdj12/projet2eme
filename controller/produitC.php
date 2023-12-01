<?php 
    require_once "config.php";
    require_once "./../../model/produit.php";
    require_once "./../../model/SmallBuisness.php";
    require_once "./../../vendor/autoload.php";
    use Twilio\Rest\Client;

    
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
            // Liaison du paramètre ':id' à la valeur fournie
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
    function ajouterproduit($produit){
        $account_sid = "AC472524970539c9b0feb60fd47a15b506";
        $auth_token = "103f98859c51192b1d71b108bdc1320e";
        $twilio_number = "+19372624991";
        $client = new Client($account_sid, $auth_token);
                            
        $name=$produit->getname();
      
        $descriptionP=$produit->getdescription_p();
        $stock=$produit->getstock();
        $prix=$produit->getprix();
      
        try {
            $sql = "INSERT INTO produit (name,descriptionP,stock,prix)
            VALUES('$name','$descriptionP','$stock','$prix')";

            $db = config::getConnexion();
                $query = $db->prepare($sql);
                $query->execute();

                $client->messages->create(
                    
                    '+21629349852',
                    array(
                        'from' => $twilio_number,
                        'body' => "We have added '$name' to our products "
                    )
                );
            } catch(Exception $e){
                $e->getMessage();
            }
}

function modifierproduit($produit,$id){    
    $name=$produit->getname();
      
    $descriptionP=$produit->getdescription_p();
    $stock=$produit->getstock();
    $prix=$produit->getprix();
   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
        "UPDATE produit SET
         name = '$name',  descriptionP= '$descriptionP',stock= '$stock',prix= '$prix'
        WHERE id_produit = '$id'");
        $query->execute();
        echo"succ";
    } catch (PDOException $e) {
        $e->getMessage();

    }
}
    }