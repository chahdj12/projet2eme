<?PHP
    include_once '../../Controller/UtilisateurC.php';
    session_start();
	$utilisateurC=new UtilisateurC();
	
	if (isset($_GET["email"])){
		$utilisateurC->verifierUtilisateur($_GET["email"]);
		header('Location: index.php');
         $_SESSION['message'] = 'account verified !';
        if (isset($_SESSION['username'])) {	
            $_SESSION['verified'] = 1;
        }
	}

?>