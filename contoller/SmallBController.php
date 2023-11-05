<?php 
    require_once "../config.php";
    require_once "./../model/SmallBuisness.php";

    class SmallBController {
       
        function ajouterutilisateur($smallB){

                            
                $name=$smallB->getname();
                $categorie=$smallB->getcategorie();
                $lieu=$smallB->getlieu();
                $descriptionS=$smallB->getdescription();
                $logo=$smallB->getlogo();
              
        try {
            $sql = "INSERT INTO smallB (nameS,categorie,lieu,descriptionS,logo)
            VALUES('$name','$categorie','$lieu','$descriptionS','$logo')";

            $db = config::getConnexion();
                $query = $db->prepare($sql);
                $query->execute();
            } catch(Exception $e){
				$e->getMessage();
			}
        }
       

        function supprimersmallB($id){
            $db = config::getConnexion();
            $sql = "DELETE FROM smallB where id=:id";

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
           
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
				"UPDATE smallS SET
				 nameS = '$name',  categorie= '$categorie',lieu= '$lieu',descriptionS= '$descriptionS' ,logo='$logo'
				WHERE id = '$id'");
				$query->execute();
                echo"succ";
			} catch (PDOException $e) {
				$e->getMessage();

			}
		}
		
    }


 


?>