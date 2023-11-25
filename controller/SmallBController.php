<?php 
    require_once "config.php";
    require_once "./../../model/SmallBuisness.php";

    class SmallBController {
        // SmallBController.php



    function affichermodif($id) {
        $sql = "SELECT * FROM small_bs WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id'=>$id]);

             $liste = $query->fetchAll();
            return $liste;
        } catch(Exception $e){
            $e->getMessage();
        }
    }

        public function afficherSmallB(){
      
            $data= array();
            $db = config::getConnexion();
                $sql="SELECT * FROM small_bs";
                $query = $db->prepare($sql);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                  $data[] = $row;
                }
                return $data;
     
            }
       
        function ajouterSmallB($smallB){

                            
                $name=$smallB->getname();
                $categorie=$smallB->getcategorie();
                $lieu=$smallB->getlieu();
                $descriptionS=$smallB->getdescription();
                $logo=$smallB->getlogo();
                $id_produit=$smallB->getIdProduit();
              
        try {
            $sql = "INSERT INTO small_bs (nameS,categorie,lieu,descriptionS,logo,produit)
            VALUES('$name','$categorie','$lieu','$descriptionS','$logo','$id_produit')";

            $db = config::getConnexion();
                $query = $db->prepare($sql);
                $query->execute();
            } catch(Exception $e){
				$e->getMessage();
			}
        }
       

        function supprimersmallB($id){
            $db = config::getConnexion();
            $sql = "DELETE FROM small_bs where id=:id";

            try {
                $query = $db->prepare($sql);
                $query->execute(['id'=>$id]);
            }catch(Exception $e){
				$e->getMessage();
			}
        }
    
		function modifiersmallB($smallB,$id){    
            $name=$smallB->getname();
            $categorie=$smallB->getcategorie();
            $lieu=$smallB->getlieu();
            $descriptionS=$smallB->getdescription();
            $logo=$smallB->getlogo();
            $id_produit=$smallB->getIdProduit();
           
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
				"UPDATE small_bs SET
				 nameS = '$name',  categorie= '$categorie',lieu= '$lieu',descriptionS= '$descriptionS' ,logo='$logo',produit='$id_produit'
				WHERE id = '$id'");
				$query->execute();
                echo"succ";
			} catch (PDOException $e) {
				$e->getMessage();

			}
		}
        public function afficherSmallBByProduct($id){
      
            $data= array();
            $db = config::getConnexion();
                $sql="SELECT * FROM small_bs WHERE produit=:id";
                $query = $db->prepare($sql);
                $query->execute(['id'=>$id]);
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                  $data[] = $row;
                }
                return $data;
     
            }
    }


 


?>