<?php
include "../../controller/produitC.php";
$productC=new produitC();
$list = $productC->afficheProduit();

if (isset($_POST['query'])) {
    $searchQuery = $_POST['query'];
    $list = $productC->searchProducts($searchQuery);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>tunisian tales-small business</title>
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
  					<a href="#" class="tm-site-name">tunisian tales</a>	
  				</div>
	  			<div class="col-lg-6 col-md-8 col-sm-9">
	  				<div class="mobile-menu-icon">
		              <i class="fa fa-bars"></i>
		            </div>
	  				<nav class="tm-nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="smallbu.html" class="active">Small business</a></li>
							<li><a href="contact.html">Contact</a></li>
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
					<h1 class="tm-banner-title">tunisian products <span class="tm-yellow-text">our </span> small business</h1>
					<p class="tm-banner-subtitle">treat</p>
					<a href="#more" class="tm-banner-link">Learn More</a>	
				</div>
		      <img src="img/banner-2.jpg" />
		    </li>
		    <li>
			    <div class="tm-banner-inner">
					<h1 class="tm-banner-title">Explore, <span class="tm-yellow-text">Enjoy,</span> Adore</h1>
					<p class="tm-banner-subtitle">TRADITIONAL ITEMS</p>
					<a href="#more" class="tm-banner-link">Learn More</a>	
				</div>
		      <img src="img/banner-3.jpg" />
		    </li>
		    <li>
			    <div class="tm-banner-inner">
					<h1 class="tm-banner-title">support <span class="tm-yellow-text">our</span> small business</h1>
					<p class="tm-banner-subtitle">unique pieces</p>
					<a href="#more" class="tm-banner-link">Learn More</a>	
				</div>
		      <img src="img/banner-1.jpg" />
		    </li>
		  </ul>
		</div>			
	</section>

	<!-- gray bg -->	
	<section class="container tm-home-section-1" id="more">
		
	
		<div class="section-margin-top">
			<div class="row">				
				<div class="tm-section-header">
					<div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-6 col-md-6 col-sm-6"><h2 class="tm-section-title">Our Products</h2></div>
					<div class="col-lg-3 col-md-3 col-sm-3"><hr></div>	
				</div>
			</div>
			<div class="row">
					<div class="col-lg-12">
						<div class="tm-search-container">
							<input type="text" id="searchInput" placeholder="Search products...">
						</div>
					</div>
			</div>
			<div class="row">
			<div id="productContainer">
			<?php    foreach ($list as $row)  { ?>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="tm-tours-box-1">
						<img src="img/tours-09.jpg" alt="image" class="img-responsive">
						<div class="tm-tours-box-1-info">
							<div class="tm-tours-box-1-info-left">
								<p class="text-uppercase margin-bottom-20"><?php    echo $row['name'] ?></p>	
								
							</div>
							<div class="tm-tours-box-1-info-right">
								<p class="gray-text tours-1-description"><?php    echo $row['descriptionP'] ?></p>	
							</div>							
						</div>
						<div class="tm-tours-box-1-link">
							<div class="tm-tours-box-1-link-left">
							<?php    echo $row['prix'] ?> DT
							</div>
								
							<?php echo'
                                              
                                              <a href="./detailsProduct.php?id='. $row['id_produit'].'" class="tm-tours-box-1-link-right">
											  Details
                                              </a>'

                                            ?>						
						</div>
					</div>					
				</div>
				<?php     } ?>
			</div>		
			</div>		
		</div>
	</section>		
	
	<!-- white bg -->
	
	<footer class="tm-black-bg">
		<div class="container">
			<div class="row">
				<p class="tm-copyright-text">Copyright &copy; 2084 tunisian tales 
                
                | Designed by templatemo</p>
			</div>
		</div>		
	</footer>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
  	<script type="text/javascript" src="js/moment.js"></script>							<!-- moment.js -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>	<!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
   	<script type="text/javascript" src="js/templatemo-script.js"></script>  
	   <script>
			$(document).ready(function() {
				
				$('#searchInput').on('input', function() {
					var searchQuery = $(this).val();
					$.ajax({
						type: 'POST',
						url: 'searchProduct.php',
						data: { query: searchQuery },
						success: function(response) {
							$('#productContainer').html(response);
						}
					});
				});
			});
		</script>


	<script>
		
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
