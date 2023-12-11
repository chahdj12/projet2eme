<?php
session_start();
use chillerlan\QRCode\QRCode;
require_once('../../TCPDF/tcpdf.php');

require_once('../../php-qrcode-5.0.0/src/QRCode.php');
require_once("../../Controller/TicketC.php");
if (isset($_GET["idReservation"]) && isset($_GET["matricule"]) && isset($_GET["prixTotale"])) {
    $idReservation = $_GET["idReservation"];
    $matricule = $_GET["matricule"];
    $prixTotale = $_GET["prixTotale"];

    $ticket = new Ticket(0, $idReservation, $matricule, $prixTotale);

   // $ticketC->ajouterTicket($ticket);

    // Generate PDF
    generatePDF($ticket);
    header('Location: tickets.php');
}

function generatePDF($ticket) {
    $pdf = new TCPDF();

    // Add your PDF content here
    $pdf->AddPage();
    $pdf->setFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'Ticket Information', 0, 1, 'C'); // Centered title with newline

    // Add ticket details to the PDF with additional spacing
    $pdf->setFont('helvetica', '', 8);
    $pdf->Cell(0, 10, 'ID Reservation: ' . $ticket->getIdReservation(), 0, 1);
    $pdf->Cell(0, 10, 'Matricule: ' . $ticket->getMatricule(), 0, 1);
    $pdf->Cell(0, 10, 'Prix Totale: ' . $ticket->getPrixTotale(), 0, 1);

    // Save or output the PDF
    $pdf->Output('output.pdf', 'I');
    header("Location: tickets.php");
}
$ticketC = new TicketC();
$tickets = $ticketC->afficherTickets();


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
                        <h1 class="tm-banner-title"> <span class="tm-yellow-text">Tikets</span> </h1>
                    </div>
                    <img src="img/banner-2.jpg" />
                </li>

            </ul>
        </div>
    </section>

    <!-- gray bg -->
    <section class="container tm-home-section-1" id="more">
        <div class="container">
        <div class="row">
                <div class="tm-section-header section-margin-top">
                    <div class="col-lg-4 col-md-3 col-sm-3">
                        <hr>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <h2 class="tm-section-title">My Tickets</h2>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-3">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>date Reservation</th>
                                        <th>Matricule</th>
                                        <th>Prix Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>date Reservation</th>
                                        <th>Matricule</th>
                                        <th>Prix Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ($tickets as $ticket) { ?>
    <tr>
        <td><?= $ticket['id'] ?></td>
        <td><?= $ticket['dateDebut'] ?></td>
        <td><?= $ticket['matricule'] ?></td>
        <td><?= $ticket['prixTotale'] ?></td>
        <td>
            <!-- Bouton pour afficher le modal -->
            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#qrCodeModal<?= $ticket['id'] ?>">Générer QR Code</button>

            <!-- Modal -->
            <div class="modal fade" id="qrCodeModal<?= $ticket['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="qrCodeModalLabel<?= $ticket['id'] ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="qrCodeModalLabel<?= $ticket['id'] ?>">QR Code pour le ticket <?= $ticket['id'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Afficher le QR Code ici -->
qr                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
<?php } ?>

                                </tbody>
                            </table>
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
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> <!-- jQuery -->
    <script type="text/javascript" src="js/moment.js"></script> <!-- moment.js -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- bootstrap js -->
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script> <!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

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
    <!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Inclure le fichier JavaScript de Bootstrap (assurez-vous qu'il est compatible avec votre version de Bootstrap) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>