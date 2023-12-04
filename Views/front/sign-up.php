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
	<div class="tm-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
					<a href="#" class="tm-site-name">Holiday</a>	
				</div>
				<div class="col-lg-6 col-md-8 col-sm-9">
					<div class="mobile-menu-icon">
						<i class="fa fa-bars"></i>
					</div>
					<nav class="tm-nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="sign-in.php" class="">Sign in</a></li>
							<li><a href="sign-up.php" class="active">Sign up</a></li>
						</ul>
					</nav>		
				</div>				
			</div>
		</div>	  	
	</div>

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
				<form class="form" method="post" class="tm-contact-form" action="ajouterUtilisateur.php" id="form"  onsubmit="event.preventDefault(); verif();">
				<div class="col-lg-6 col-md-6 tm-contact-form-input">
											<div class="form-group">
												<input name="username" id="username"  type="text" placeholder="Username">
											</div>
											<div class="form-group">
												<input name="nom_user" id="nom_user" type="text" placeholder="first name">
											</div>
											<div class="form-group">
												<input name="prenom_user" id="prenom_user" type="text" placeholder="last name">
											</div>
											<div class="form-group">
												<input name="email_user" id="email_user" type="text" placeholder="Your Email">
											</div>	
										
											<div class="form-group">
												<input name="tel_user" id="tel_user" type="text" placeholder="Your Phone">
											</div>	
										
                                        
											<div class="form-group">
												<input name="password_user" id="password_user" type="password" placeholder="Your Password">
											</div>	
										
                                        
											<div class="form-group">
												<input name="" id="re_password_user" type="password" placeholder="Confirm password">
											</div>	
										
                                   
											<div class="form-group">
												<input name="adresse_user" type="text" placeholder="Your Adress">
											
                                    </div>
                                    	<div class="form-group">
												<button type="submit" name="ajouter_utilisateur" class="btn " onclick="verif();">sign up</button>
										</div>
									</div>
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
