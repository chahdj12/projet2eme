<?php
require_once("../../Controller/OffreC.php"); // Assuming the path to your OffreC class

$offreC = new OffreC();
$offres = $offreC->afficherOffres();
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

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
                            <li><a href="about.html">About</a></li>
                            <li><a href="offres.php" class="active">offres</a></li>
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
                        <h1 class="tm-banner-title">Discrover <span class="tm-yellow-text">Tunisia's</span> Beauty</h1>
                        <p class="tm-banner-subtitle">Plan your trip now!</p>
                        <a href="#more" class="tm-banner-link">Learn More</a>
                    </div>
                    <img src="img/banner-2.jpg" />
                </li>
                <li>
                    <div class="tm-banner-inner">
                        <h1 class="tm-banner-title">on vous guide vers une <span class="tm-yellow-text">meilleure</span> experience</h1>
                        <p class="tm-banner-subtitle">Hotels,Maison d'hotes,Tour Musée...</p>
                        <a href="#more" class="tm-banner-link">Learn More</a>
                    </div>
                    <img src="img/banner-3.jpg" />
                </li>
                <li>
                    <div class="tm-banner-inner">
                        <h1 class="tm-banner-title">meilleur <span class="tm-yellow-text">Experience</span> </h1>
                        <p class="tm-banner-subtitle"> avec nous </p>
                        <a href="#more" class="tm-banner-link">Learn More</a>
                    </div>
                    <img src="img/banner-1.jpg" />
                </li>
            </ul>
        </div>
    </section>

    <!-- gray bg -->
    <section class="container tm-home-section-1" id="more">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <!-- Nav tabs -->
                <div class="tm-home-box-1">
                    <ul class="nav nav-tabs tm-white-bg" role="tablist" id="hotelCarTabs">
                        <li role="presentation" class="active">
                            <a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">Hotel</a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active tm-white-bg" id="hotel">
                            <div class="tm-search-box effect2">
                                <form action="#" method="post" class="hotel-search-form">
                                    <div class="tm-form-inner">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="">-- Select Hotel -- </option>
                                                <option value="shangrila">Shangri-La</option>
                                                <option value="chatrium">Chatrium</option>
                                                <option value="fourseasons">Four Seasons</option>
                                                <option value="hilton">Hilton</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' class="form-control" placeholder="Check-in Date" />
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker2'>
                                                <input type='text' class="form-control" placeholder="Check-out Date" />
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group margin-bottom-0">
                                            <select class="form-control">
                                                <option value="">-- Guests -- </option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5p">5+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group tm-yellow-gradient-bg text-center">
                                        <button type="submit" name="submit" class="tm-yellow-btn">Check Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade tm-white-bg" id="car">
                            <div class="tm-search-box effect2">
                                <form action="#" method="post" class="hotel-search-form">
                                    <div class="tm-form-inner">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="">-- Select Model -- </option>
                                                <option value="shangrila">BMW</option>
                                                <option value="chatrium">Mercedes-Benz</option>
                                                <option value="fourseasons">Toyota</option>
                                                <option value="hilton">Honda</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date-time' id='datetimepicker3'>
                                                <input type='text' class="form-control" placeholder="Pickup Date" />
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date-time' id='datetimepicker4'>
                                                <input type='text' class="form-control" placeholder="Return Date" />
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="">-- Options -- </option>
                                                <option value="">Child Seat</option>
                                                <option value="">GPS Navigator</option>
                                                <option value="">Insurance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group tm-yellow-gradient-bg text-center">
                                        <button type="submit" name="submit" class="tm-yellow-btn">Check Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="section-margin-top">
            <div class="row">
                <div class="tm-section-header">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <hr>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h2 class="tm-section-title">offres</h2>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <hr>
                    </div>
                </div>
            </div>
            <form id="search-form">
                <input type="text" id="search-input" name="search" placeholder="Rechercher...">
                <button type="button" id="search-button">Rechercher</button>
            </form>
            <div class="row">

                <div id="resultats">
                    <?php include("recherche.php"); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- white bg -->
    <section class="tm-white-bg section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="tm-section-header section-margin-top">
                    <div class="col-lg-4 col-md-3 col-sm-3">
                        <hr>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <h2 class="tm-section-title">Special Packages</h2>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-3">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="tm-tours-box-2">
                        <img src="img/index-03.jpg" alt="image" class="img-responsive">
                        <div class="tm-tours-box-2-info">
                            <h3 class="margin-bottom-15">Tabarka deal</h3>
                            <img src="img/rating.png" alt="image" class="margin-bottom-5">
                            <p> a partir de 200$</p>
                        </div>
                        <a href="#" class="tm-tours-box-2-link">Book Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="tm-tours-box-2">
                        <img src="img/index-04.jpg" alt="image" class="img-responsive">
                        <div class="tm-tours-box-2-info">
                            <h3 class="margin-bottom-15">week in Touzer </h3>
                            <img src="img/rating.png" alt="image" class="margin-bottom-5">
                            <p>a partir de 870$ par personne </p>
                        </div>
                        <a href="#" class="tm-tours-box-2-link">Book Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="tm-tours-box-2">
                        <img src="img/index-05.jpg" alt="image" class="img-responsive">
                        <div class="tm-tours-box-2-info">
                            <h3 class="margin-bottom-15">Tabarka Maison d'hote</h3>
                            <img src="img/rating.png" alt="image" class="margin-bottom-5">
                            <p>90$</p>
                        </div>
                        <a href="#" class="tm-tours-box-2-link">Book Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="tm-tours-box-2">
                        <img src="img/index-06.jpg" alt="image" class="img-responsive">
                        <div class="tm-tours-box-2-info">
                            <h3 class="margin-bottom-15">Ein Drahem</h3>
                            <img src="img/rating.png" alt="image" class="margin-bottom-5">
                            <p>a partir de 50$</p>
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
                <p class="tm-copyright-text">Copyright &copy; copyrights by TunisiaTales

                    | for more informations infoline 92 005 544 </p>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/templatemo-script.js"></script>
    <script>
        $(document).ready(function() {
            $("#search-button").click(function() {
                var searchInput = $("#search-input").val();
                $.ajax({
                    type: "POST",
                    url: "recherche.php",
                    data: {
                        search: searchInput
                    },
                    success: function(data) {
                        $("#resultats").html(data);
                    }
                });
            });
        });
    </script>
    <script>
       $(document).ready(function () {
    $(".like-btn").click(function (e) {
        e.preventDefault();

        // Save a reference to the button element
        var likeButton = $(this);

        var offreId = likeButton.data('offre');
        var isLiked = likeButton.text().trim() === "Liked";

        $.ajax({
            type: "POST",
            url: "like_dislike.php",
            data: { offreId: offreId, isLiked: isLiked },
            success: function (data) {
                // Update UI based on the response
                if (isLiked) {
                    // Code to execute if the item was liked
                    likeButton.text("Unlike");
                    // You might also update other parts of the UI
                } else {
                    // Code to execute if the item was not liked
                    likeButton.text("Liked");
                    // You might also update other parts of the UI
                }
            }
        });
    });
});

    </script>

</body>

</html>