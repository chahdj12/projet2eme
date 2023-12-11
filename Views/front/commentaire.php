<?php
session_start();
require_once '../../Model/commentaire.php';
require_once '../../Controller/BlogC.php';
require_once '../../Controller/CommentaireC.php';
require_once '../../config.php';

$bc = new BlogC();

$cC=new CommentaireC();

// Create (post get) bich tithabat kan nzilit 3al button
if (isset($_POST['submit'])) {
	
	$commentaire = new Commentaire(0,$_GET['id'],$_POST['comment_text'],$_POST['date'],$_POST['likes']);
	$cC->addCommentaire($commentaire);
	
}

if (isset($_GET['id'])) {
	$blog = $bc->getBlog($_GET['id']);
	if (!$blog)
		header('location: blog.php');
} else {
	header('location: blog.php');
}

$comments = $cC->listCommentaireByIdBlog($_GET['id']);
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
	<?php require_once('header.php'); ?>



	<!-- gray bg -->
	<section class="container tm-home-section-1" id="more">
		<div class="row">
			<div class="section-margin-top">
				<div class="row">
					<div class="tm-section-header">
						<div class="col-lg-3 col-md-3 col-sm-3">
							<hr>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<h2 class="tm-section-title">Blog</h2>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<hr>
						</div>
					</div>
				</div>

				<div class="row">
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
							<div class="tm-tours-box-2-link">
								<div class="tm-tours-box-2-link-left">
									Comments
								</div>
							</div>
							<?php foreach($comments as $comment) {?>
							<div class="tm-tours-box-1-info">
									<p class="text-uppercase margin-bottom-20"><?php echo $comment["comment_text"] ?></p>
									<?php
										$starsHtml = '';
										for ($i = 1; $i <= 5; $i++) {
											if ($i <= $comment["likes"]) {
												$starsHtml .= '⭐'; // Emoji for a filled star
											} else {
												$starsHtml .= '☆'; // Emoji for an empty star
											}
										}
										echo $starsHtml;
									?>
									<p class="gray-text"><?php echo $comment["created_at"] ?></p>
							</div>
							<?php }?>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="section-margin-top">

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="tm-section-header">

										<form method="post" class="tm-contact-form" onsubmit="return validateForm()">
											<div class="col-lg-12 col-md-12 tm-contact-form-input">
												<div class="form-group">
													<input type="number" name="likes" id="like_input" class="form-control" placeholder="Likes" />
													<span id="likes_error" style="color: red;"></span>
												</div>
												<div class="form-group">
													<input type="date" name="date" id="date_input" class="form-control" placeholder="Date" />
													<span id="date_error" style="color: red;"></span>
												</div>
												<div class="form-group">
													<textarea id="contenue_input" name="comment_text" class="form-control" rows="6" placeholder="Comment"></textarea>
													<span id="comment_error" style="color: red;"></span>
												</div>
												<div class="form-group">
													<button class="tm-submit-btn" type="submit" name="submit">Add Comment</button>
												</div>
											</div>
										</form>
										<script>
											//control saisie
											function validateForm() {
												let isValid = true;
												const likes = document.getElementById('like_input').value;
												if (likes === '') {
													document.getElementById('likes_error').textContent = 'Likes is required';
													isValid = false;
												} else if (likes > 5 || likes < 0) {
													document.getElementById('likes_error').textContent = 'Likes must be between 0 and 5';
													isValid = false;
												} else {
													document.getElementById('likes_error').textContent = '';
												}

												const date = document.getElementById('date_input').value;
												if (date === '') {
													document.getElementById('date_error').textContent = 'Date is required';
													isValid = false;
												} else {
													document.getElementById('date_error').textContent = '';
												}

												const contenue = document.getElementById('contenue_input').value;
												if (contenue === '') {
													document.getElementById('comment_error').textContent = 'Comment is required';
													isValid = false;
												} else {
													document.getElementById('comment_error').textContent = '';
												}
												return isValid;
											}
										</script>
									</div>
								</div>
							</div>
						</div>
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
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> <!-- jQuery -->
	<script type="text/javascript" src="js/moment.js"></script> <!-- moment.js -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- bootstrap js -->
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script> <!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
	<script>
		// HTML document is loaded. DOM is ready.
		$(function() {

			$('#hotelCarTabs a').click(function(e) {
				e.preventDefault()
				$(this).tab('show')
			})

			$('.date').datetimepicker({
				format: 'MM/DD/YYYY'
			});
			$('.date-time').datetimepicker();

			// https://css-tricks.com/snippets/jquery/smooth-scrolling/
			$('a[href*=#]:not([href=#])').click(function() {
				if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
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