<?php
session_start();
require_once('../../Controller/LivraisonC.php');
$livraisonC = new LivraisonC();
$types = $livraisonC->afficherTypesLivraison();

if (
    isset($_POST["idPartenaire"]) &&
    isset($_POST["date"]) &&
    isset($_POST["livraison"]) &&
    isset($_POST["type"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["status"]) &&
    isset($_POST["numero"])
) {

    $idPartenaire = $_POST["idPartenaire"];
    $date = $_POST["date"];
    $livraison = $_POST["livraison"];
    $type = $_POST["type"];
    $adresse = $_POST["adresse"];
    $status = $_POST["status"];
    $numero = $_POST["numero"];

    $livraison = new Livraison(0, $idPartenaire, $date, $type, $adresse, $status, $numero);

    $livraisonC->ajouterLivraison($livraison);

    header("Location:mesLivraisons.php");
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
	<?php require_once("header.php"); ?>
	
	<!-- Banner -->
	<section class="tm-banner">
		<!-- Flexslider -->
		<div class="flexslider flexslider-banner">
		  <ul class="slides">
		    <li>
			    <div class="tm-banner-inner">
					<h1 class="tm-banner-title"> <span class="tm-yellow-text">Livraison</span> </h1>
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
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="idPartenaire" name="idPartenaire" value="<?php echo $_GET['id']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="livraison">Livraison</label>
                                <input type="text" class="form-control" id="livraison" name="livraison">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type">
                                    <?php foreach ($types as $type) : ?>
                                        <option value="<?= $type['id'] ?>"><?= $type['nom'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            </section>
                            <div class="row">
			
                            <section class="container tm-home-section-1" id="more">
                            <div class="col-lg-4 col-md-4 col-sm-6">
											
                                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
				<div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-center">
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" id="adresse" name="adresse">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status">
                            </div>
                            <div class="form-group">
                                <label for="numero">Numéro</label>
                                <input type="text" class="form-control" id="numero" name="numero">
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                        <section class="container tm-home-section-1" id="more"></section>
                    </div>
                </div>
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
            var idPartenaire = document.getElementById('idPartenaire').value;
            var date = document.getElementById('date').value;
            var livraison = document.getElementById('livraison').value;
            var type = document.getElementById('type').value;
            var adresse = document.getElementById('adresse').value;
            var status = document.getElementById('status').value;
            var numero = document.getElementById('numero').value;

            // Vérifiez ici vos conditions de validation
            if (idPartenaire === '' || date === '' || livraison === '' || type === '' || adresse === '' || status === '' || numero === '') {
                alert('Veuillez remplir tous les champs.');
                return false;
            }


            return true;
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
