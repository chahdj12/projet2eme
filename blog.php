<?php

//connection base de donne
require_once 'config/config.php';
$pdo = config::getConnexion();

// Create (post get) bich tithabat kan nzilit 3al button
if (isset($_POST['submit'])) {
	//les variables
    $titre = $_POST['titre'];
    $mail = $_POST['mail'];
    $date = $_POST['date'];
    $contenue = $_POST['contenue'];
	//requet ajoute
    $stmt = $pdo->prepare('INSERT INTO blog (title, mail, date, contenue) VALUES (?, ?, ?, ?)');
    $stmt->execute([
		$titre, 
		$mail, 
		$date, 
		$contenue]);
	
}

//requet select (read)
$selectQuery = $pdo->query('SELECT * FROM blog');
$blogs = $selectQuery->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Holiday - Tours</title>
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
  <body class="tm-gray-bg">
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
							<li><a href="index.html">Home</a></li>
							<li><a href="admin/index.html">Admin</a></li>
							<li><a href="tours.html">Our Tours</a></li>
							<li><a href="blog.php" class="active">Blog</a></li>
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
					<h1 class="tm-banner-title">Find Our <span class="tm-yellow-text">Blog</span></h1>
					<p class="tm-banner-subtitle">Keep It Updated</p>
				</div>
		      <img src="img/banner-2.jpg" />
		    </li>
		  </ul>
		</div>			
	</section>

	<section class="container tm-home-section-1" id="more">
		<div class="row">
		<div class="section-margin-top">
			<div class="row">				
				<div class="tm-section-header">
					<div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-6 col-md-6 col-sm-6"><h2 class="tm-section-title">Add A Blog</h2></div>
					<div class="col-lg-3 col-md-3 col-sm-3"><hr></div>	
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="tm-section-header">
						
						<form method="post" class="tm-contact-form" onsubmit="return validateForm()">
							<div class="col-lg-12 col-md-12 tm-contact-form-input">
								<div class="form-group">
									<input type="text" name="titre" id="title_input" class="form-control" placeholder="Titre" />
								</div>
								<div class="form-group">
									<input type="text" name="mail" id="contact_email" class="form-control" placeholder="Mail" />
								</div>
								<div class="form-group">
									<input type="date" name="date" id="date_input" class="form-control" placeholder="Date" />
								</div>
								<div class="form-group">
									<textarea id="contenue_input" name="contenue" class="form-control" rows="6" placeholder="Contenue"></textarea>
								</div>
								<div class="form-group">
									<button class="tm-submit-btn" type="submit" name="submit">Submit now</button> 
								</div>               
							</div>
						</form>
						<script>
							//control saisie
							function validateForm() {
								let isValid = true;
								let ErrorMessage = "";
								const titre = document.getElementById('title_input').value;
								if (titre === '') {
									ErrorMessage = 'Titre is required';
									isValid = false;
								}

								const mail = document.getElementById('contact_email').value;
								const mailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
								if (mail === '') {
									ErrorMessage = 'Mail is required';
									isValid = false;
								} else if (!mailRegex.test(mail)) {
									ErrorMessage = 'Invalid email format';
									isValid = false;
								}

								const date = document.getElementById('date_input').value;
								if (date === '') {
									ErrorMessage = 'Date is required';
									isValid = false;
								}

								const contenue = document.getElementById('contenue_input').value;
								if (contenue === '') {
									ErrorMessage = 'Contenue is required';
									isValid = false;
								}
								if(isValid === false)
								{
									alert(ErrorMessage);
								}
								return isValid;
							}
						</script>
					</div>					
				</div>
			</div>		
		</div>
	</section>	
	
	<!-- gray bg -->	
	<section class="container tm-home-section-1" id="more">
		<div class="row">
		<div class="section-margin-top">
			<div class="row">				
				<div class="tm-section-header">
					<div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-6 col-md-6 col-sm-6"><h2 class="tm-section-title">Our Blog</h2></div>
					<div class="col-lg-3 col-md-3 col-sm-3"><hr></div>	
				</div>
			</div>
			
			<div class="row">
				<?php //affichage les blogs
				 foreach($blogs as $blog) {?>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="tm-tours-box-1">
						<img src="img/tours-06.jpg" alt="image" class="img-responsive">
						<div class="tm-tours-box-1-info">
							<div class="tm-tours-box-1-info-left">
								<p class="text-uppercase margin-bottom-20"><?php echo $blog["title"] ?></p>	
								<p class="gray-text"><?php echo $blog["date"] ?></p>
							</div>
							<div class="tm-tours-box-1-info-right">
								<p class="gray-text tours-1-description" style="height: 150px;overflow-y:scroll;"><?php echo $blog["contenue"] ?></p>	
							</div>							
						</div>
						<div class="tm-tours-box-1-link">
							<div class="tm-tours-box-1-link-left">
							<?php echo $blog["mail"] ?>
							</div>
							<a href="#" class="tm-tours-box-1-link-right">
								More								
							</a>							
						</div>
					</div>					
				</div>
				<?php } ?>
				
			</div>		
		</div>
	</section>		
	
	<!-- white bg -->
	<footer class="tm-black-bg">
		<div class="container">
			<div class="row">
				<p class="tm-copyright-text">Copyright &copy; 2084 Your Company Name 
                
                | Designed by templatemo</p>
			</div>
		</div>		
	</footer>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
  	<script type="text/javascript" src="js/moment.js"></script>							<!-- moment.js -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>	<!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
   	<script type="text/javascript" src="js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
	<script>
		// HTML document is loaded. DOM is ready.
		$(function() {

			$('#hotelCarTabs a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})

        	$('.date').datetimepicker({
            	format: 'MM/DD/YYYY'
            });
            $('.date-time').datetimepicker();
           
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
		});
		
		// Load Flexslider when everything is loaded.
		$(window).load(function() {	  		
		    $('.flexslider').flexslider({
			    controlNav: false
		    });
	  	});
	</script>
 </body>
 </html>
