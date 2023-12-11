<?php
include_once '../../Model/Utilisateur.php';
include_once '../../Controller/UtilisateurC.php';

session_start();

$utilisateurC = new UtilisateurC();



if (isset($_SESSION['id_user'])){
    $utilisateur = $utilisateurC->getUtilisateurById($_SESSION['id_user']);
}



if (
    isset($_POST["nom_user"]) &&
    isset($_POST["prenom_user"]) &&
    isset($_POST["email_user"]) &&
    isset($_POST["tel_user"]) &&
    isset($_POST["adresse_user"]) &&
    isset($_POST["username"]) &&
    isset($_POST["password_user"]) 
) {

    if (
        !empty($_POST["nom_user"]) &&
        !empty($_POST["prenom_user"]) &&
        !empty($_POST["email_user"]) &&
        !empty($_POST["tel_user"]) &&
        !empty($_POST["adresse_user"]) &&
        !empty($_POST["username"]) &&
        !empty($_POST["password_user"]) 
    ){
        $nom_user = $_POST['nom_user'] ;
        $prenom_user = $_POST['prenom_user'] ;
        $email_user = $_POST['email_user'] ;
        $tel_user = $_POST['tel_user'] ;
        $adresse_user = $_POST['adresse_user'] ;
        $username = $_POST['username'] ;
        $password_user = md5($_POST['password_user']) ;
        $role_user = 'ROLE_USER' ;

        $utilisateur = new Utilisateur($nom_user,
            $prenom_user,
            $email_user,
            $tel_user,
            $adresse_user,
            $username,
            $password_user,
            $role_user
        );

        $utilisateurC->modifier_Utilisateur($utilisateur,$_POST['id_user']);
        header('Location: profile.php');
    }




}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Holiday - Contact</title>
<!--
Holiday Template
http://www.templatemo.com/tm-475-holiday
-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
	<link href="css/flexslider.css" rel="stylesheet">
	<link href="css/templatemo-style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<!-- Header -->
	<?php require 'header.php'; ?>
	<!-- Banner -->
	<section class="tm-banner">
		<!-- Flexslider -->
		<div class="flexslider flexslider-banner">
		  <ul class="slides">
		    <li>
			    <div class="tm-banner-inner">
					<h1 class="tm-banner-title">Your <span class="tm-yellow-text">Special</span> Tour</h1>
					<p class="tm-banner-subtitle">For Upcoming Holidays</p>
					<a href="#more" class="tm-banner-link">Contact Us</a>	
				</div>
				<img src="img/banner-3.jpg" alt="Banner 3" />	
		    </li>		    
		  </ul>
		</div>	
	</section>

	<!-- gray bg -->	
			
	
	<!-- white bg -->
	<section class="section-padding-bottom">
		<div class="container">
			<div class="row">
				<div class="tm-section-header section-margin-top">
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-4 col-md-6 col-sm-6"><h2 class="tm-section-title">Create an account</h2></div>
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>	
				</div>				
			</div>
			<div class="row">
				<!-- contact form -->
                <div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
				<form method="POST" >
                        <div class="form-group">
                        <div class="form-group">
                                        <label for="exampleInputUsername1">id</label>
                                        <input type="text" class="form-control" name="id_user" id="id" value="<?php echo $utilisateur['id_user']; ?>"   readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nom</label>
                                        <input type="text" name="nom_user" class="form-control" id="nom_user" value="<?php echo $utilisateur['nom_user']; ?>">
                                        <div id="error_nom_user" class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">prenom</label>
                                        <input type="text" class="form-control" name="prenom_user" id="prenom_user" value="<?php echo $utilisateur['prenom_user']; ?>" placeholder="prenom user">
                                        <div id="error_prenom_user" class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">email</label>
                                        <input type="email" name="email_user" class="form-control" id="email_user" value="<?php echo $utilisateur['email_user']; ?>" >
                                        <div id="error_email_user" class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">tel</label>
                                        <input type="tel" class="form-control" name="tel_user" id="tel_user" value="<?php echo $utilisateur['tel_user']; ?>" >
                                        <div id="error_tel_user" class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">adresse</label>
                                        <input type="text" class="form-control" name="adresse_user" id="adresse_user" value="<?php echo $utilisateur['adresse_user']; ?>" >
                                        <div id="error_adresse_user" class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">adresse</label>
                                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $utilisateur['username']; ?>" >
                                        <div id="error_username" class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">password</label>
                                        <input type="password" class="form-control" name="password_user" id="password_user" value="<?php echo $utilisateur['password_user']; ?>" >
                                        <div id="error_password_user" class="error"></div>
                                    </div>
                                    

                                    <button type="submit" class="btn btn-primary me-2" name="submitbtn" >Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                        </form>
			</div>			
		</div>
	</section>
	<footer class="tm-black-bg">
		<div class="container">
			<div class="row">
				<p class="tm-copyright-text">Copyright &copy; 2084 Your Company Name 
                
                | Designed by templatemo</p>
			</div>
		</div>		
	</footer>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>			<!-- flexslider js -->
	<script type="text/javascript" src="js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
	<script>
    function allLetter(word) {
    var letters = /^[A-Za-z]+$/;
    if (word.match(letters)) {
        return true;
    }
    else {
        return false;
        
    }
  }
  function startsWithCapital(word) {
    if (/[A-Z]/.test(word[0])) {
        return true;
    }
    else {
        return false;
        
    }
  }
  function verif() {
     var username =document.getElementById("username").value;
     var nom =document.getElementById("nom_user").value;
     var prenom =document.getElementById("prenom_user").value;
     var email =document.getElementById("email_user").value;
     var tel =document.getElementById("tel_user").value;
	 var password =document.getElementById("password_user").value;
	 var re_password =document.getElementById("re_password_user").value;

  var ok=true;
     if (allLetter(nom) === false) { alert("le titre doit etre en lettres ");
     document.getElementById("msgDiv1").innerHTML = "le nom doit etre en lettres ";
     preventdefault();
     returnToPreviousPage();
     return false;
    }

	if (allLetter(prenom) === false) { alert("le titre doit etre en lettres ");
     document.getElementById("msgDiv1").innerHTML = "le nom doit etre en lettres ";
     preventdefault();
     returnToPreviousPage();
     return false;
    }  

     if (startsWithCapital(username) == false) { alert("le premier lettre du username en majiscule!"); 
     document.getElementById("msgDiv12").innerHTML = "le premier lettre du username doit etre en majiscule! ";
     preventdefault();
     returnToPreviousPage();
     return false;
    }
    
    if (tel < 10000000) {
        alert("verifier numero telephone"); 
        document.getElementById("msgDiv12").innerHTML = "verifier numero telephone ";
        preventdefault();
        returnToPreviousPage();
        return false;
    }

   

    if (password != re_password) {
      alert("les mots de passe ne sont pas identiques"); 
        document.getElementById("msgDiv12").innerHTML = "les mots de passe ne sont pas identiques ";
        preventdefault();
        returnToPreviousPage();
        return false;
}

       
  
     
        document.forms["form"].submit();

        return true;

  }
</script>
	
</body>
</html>
