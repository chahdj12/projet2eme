<?PHP
	include_once "../../controller/UtilisateurC.php";

	
		$utilisateurC=new UtilisateurC();
	
		if (isset($_GET["id"])){
			$utilisateurC->supprimer_Utilisateur($_GET["id"]);
			// header('Refresh:0');
			header('Location: Utilisateurs.php');
		}
	
?>