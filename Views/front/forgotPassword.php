<?php
 include_once '../../Model/Utilisateur.php';
 include_once '../../Controller/UtilisateurC.php';
session_start() ; 
if (isset($_SESSION["username"]))
{
	if ($_SESSION["role_user"] == "ADMIN_ROLE")
		header("location:../back/Utilisateurs.php") ; 
	else if ($_SESSION["role_user"] == "USER_ROLE")
	header("location:index.php") ; 
}



if (isset($_POST['email'])) {
    $email_user = $_POST['email'];
    $newPass = uniqid();
    $utilisateurC = new UtilisateurC();
    $utilisateurC->resetPassword($email_user,md5($newPass));
    include_once 'sendPassword.php';
    ?>
    <script>alert('nouveau mot de passe envoyé');
    sleep(3);
    </script>
    <?php
    header('Location: sign-in.php');
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
							<li><a href="sign-in.php" class="active">Sign In</a></li>
							<li><a href="sign-up.php" >Sign up</a></li>
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
					<div class="col-lg-4 col-md-6 col-sm-6"><h2 class="tm-section-title">log In</h2></div>
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>	
				</div>				
			</div>
			<div class="form-main">
							<div class="title">
							
							</div>
							<form class="form" method="post" action="">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>email<span>*</span></label>
											<input name="email" type="text" >
										</div>
									</div>
								</div>
								

						

									<div class="row">
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" name="" class="btn ">Reset</button>
											</div>
										</div>
									</div>
									
							</form>
						</div>
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
		/* Google map
      	------------------------------------------------*/
      	var map = '';
      	var center;

      	function initialize() {
	        var mapOptions = {
	          	zoom: 14,
	          	center: new google.maps.LatLng(37.769725, -122.462154),
	          	scrollwheel: false
        	};
        
	        map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

	        google.maps.event.addDomListener(map, 'idle', function() {
	          calculateCenter();
	        });
        
	        google.maps.event.addDomListener(window, 'resize', function() {
	          map.setCenter(center);
	        });
      	}

	    function calculateCenter() {
	        center = map.getCenter();
	    }

	    function loadGoogleMap(){
	        var script = document.createElement('script');
	        script.type = 'text/javascript';
	        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
	        document.body.appendChild(script);
	    }
	
      	// DOM is ready
		$(function() {

			// https://css-tricks.com/snippets/jquery/smooth-scrolling/
			$('a[href*=#]:not([href=#])').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					if (target.length) {
						$('html,body').animate({
							scrollTop: target.offset().top
						}, 1000);
						return false;
					}
				}
			});

		  	// Flexslider
		  	$('.flexslider').flexslider({
		  		controlNav: false,
		  		directionNav: false
		  	});

		  	// Google Map
		  	loadGoogleMap();
		  });
	</script>
</body>
</html>
