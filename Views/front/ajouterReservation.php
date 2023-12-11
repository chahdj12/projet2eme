<?php
session_start();
require_once('../../Controller/ReservationC.php');
$reservationC  = new ReservationC();
if (
    isset($_POST["typePaiement"]) && 
    isset($_POST["nbrPersonnes"]) && 
    isset($_POST["dateDebut"]) && 
    isset($_POST["dateFin"]) && 
    isset($_POST["nbrChambres"]) && 
    isset($_POST["typePension"])) {

    $typePaiement = $_POST["typePaiement"];
    $nbrPersonnes = $_POST["nbrPersonnes"];
    $dateDebut = $_POST["dateDebut"];
    $dateFin = $_POST["dateFin"];
    $nbrChambres = $_POST["nbrChambres"];
    $typePension = $_POST["typePension"];
    $idUser =  1;

    $reservation = new Reservation(0, $idUser, $typePaiement, $nbrPersonnes, $dateDebut, $dateFin, $nbrChambres, $typePension);

	$id = $reservationC->ajouterReservation2($reservation);

	$tarifParPersonne = 50; // Tarif par personne
$tarifParChambre = 100; // Tarif par chambre
$tarifPensionComplete = 20; // Tarif pour la pension complète par personne
$tarifDemiPension = 10; // Tarif pour la demi-pension par personne

// Calculez le prix total en fonction des tarifs et des valeurs postées
$prixTotal = ($tarifParPersonne * $nbrPersonnes) + ($tarifParChambre * $nbrChambres);

// Ajoutez le coût de la pension en fonction du type sélectionné
if ($typePension == "pension-complete") {
    $prixTotal += ($tarifPensionComplete * $nbrPersonnes);
} elseif ($typePension == "demi-pension") {
    $prixTotal += ($tarifDemiPension * $nbrPersonnes);
}
$matricule = 'R' . $id . '-' . date('YmdHis');

require('stripe.php');
   // header("Location:index.html");
}
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
	<?php require ('header.php'); ?>
	
	<!-- Banner -->
	<section class="tm-banner">
		<!-- Flexslider -->
		<div class="flexslider flexslider-banner">
		  <ul class="slides">
		    <li>
			    <div class="tm-banner-inner">
					<h1 class="tm-banner-title">New <span class="tm-yellow-text">Reservation</span> </h1>
				</div>
		      <img src="img/banner-2.jpg" />
		    </li>
		    
		  </ul>
		</div>			
	</section>

	<!-- gray bg -->	
	<section class="container tm-home-section-1" id="more">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6">
											
			</div>

			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-center">
                    <br>
                    <br>
                    <br>
                   <form method="POST" onsubmit="return validateForm()">
                    
                            <div class=" form-group">
                        <label for="typePaiement">Type de Paiement</label>
                        <select class="form-control" id="typePaiement" name="typePaiement" >
                            <option value="card">Carte</option>
                            <option value="cash">Espèces</option>
                        </select>
                        </div>
                    <div class="form-group">
                        <label for="nbrPersonnes">Nombre de Personnes</label>
                        <input type="number" class="form-control" id="nbrPersonnes" name="nbrPersonnes" >
                    </div>
                    <div class="form-group">
                        <label for="dateDebut">Date de Début</label>
                        <input type="date" class="form-control" id="dateDebut" name="dateDebut" >
                    </div>
                    <div class="form-group">
                        <label for="dateFin">Date de Fin</label>
                        <input type="date" class="form-control" id="dateFin" name="dateFin" >
                    </div>
                    <div class="form-group">
                        <label for="nbrChambres">Nombre de Chambres</label>
                        <input type="number" class="form-control" id="nbrChambres" name="nbrChambres" >
                    </div>
                    <div class="form-group">
                        <label for="typePension">Type de Pension</label>
                        <select class="form-control" id="typePension" name="typePension" >
                            <option value="pension-complete">Pension Complète</option>
                            <option value="demi-pension">Demi-pension</option>
                            <option value="sans-pension">Sans Pension</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>	
				</div>				
			</div>
			
		</div>
	
		
	</section>		
	
	<!-- white bg -->
	<section class="tm-white-bg section-padding-bottom">
		<div class="container">
			<div class="row">
				<div class="tm-section-header section-margin-top">
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-4 col-md-6 col-sm-6"><h2 class="tm-section-title">Special Packages</h2></div>
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>	
				</div>				
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-tours-box-2">						
						<img src="img/index-03.jpg" alt="image" class="img-responsive">
						<div class="tm-tours-box-2-info">
							<h3 class="margin-bottom-15">Proin Gravida Nibhvel Lorem Quis Bind</h3>
							<img src="img/rating.png" alt="image" class="margin-bottom-5">
							<p>28 March 2084</p>	
						</div>						
						<a href="#" class="tm-tours-box-2-link">Book Now</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-tours-box-2">						
						<img src="img/index-04.jpg" alt="image" class="img-responsive">
						<div class="tm-tours-box-2-info">
							<h3 class="margin-bottom-15">Proin Gravida Nibhvel Lorem Quis Bind</h3>
							<img src="img/rating.png" alt="image" class="margin-bottom-5">
							<p>26 March 2084</p>	
						</div>						
						<a href="#" class="tm-tours-box-2-link">Book Now</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-tours-box-2">						
						<img src="img/index-05.jpg" alt="image" class="img-responsive">
						<div class="tm-tours-box-2-info">
							<h3 class="margin-bottom-15">Proin Gravida Nibhvel Lorem Quis Bind</h3>
							<img src="img/rating.png" alt="image" class="margin-bottom-5">
							<p>24 March 2084</p>	
						</div>						
						<a href="#" class="tm-tours-box-2-link">Book Now</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-tours-box-2">						
						<img src="img/index-06.jpg" alt="image" class="img-responsive">
						<div class="tm-tours-box-2-info">
							<h3 class="margin-bottom-15">Proin Gravida Nibhvel Lorem Quis Bind</h3>
							<img src="img/rating.png" alt="image" class="margin-bottom-5">
							<p>22 March 2084</p>	
						</div>						
						<a href="#" class="tm-tours-box-2-link">Book Now</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<p class="home-description">Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
					Morbi accumsaipsu m velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat.
					</p>					
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
  	<script type="text/javascript" src="js/moment.js"></script>							<!-- moment.js -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>	<!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
   	<script type="text/javascript" src="js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
       <script>
    function validateForm() {
        var idUser = document.getElementById('idUser').value;
        var typePaiement = document.getElementById('typePaiement').value;
        var nbrPersonnes = document.getElementById('nbrPersonnes').value;
        var dateDebut = document.getElementById('dateDebut').value;
        var dateFin = document.getElementById('dateFin').value;
        var nbrChambres = document.getElementById('nbrChambres').value;
        var typePension = document.getElementById('typePension').value;

        // Vérification que les champs obligatoires ne sont pas vides
        if (!idUser || !typePaiement || !nbrPersonnes || !dateDebut || !dateFin || !nbrChambres || !typePension) {
            alert('Veuillez remplir tous les champs obligatoires.');
            return false;
        }

        // Vous pouvez ajouter d'autres validations ici en fonction de vos besoins

        return true; // Soumet le formulaire si la validation réussit
    }
</script>
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
