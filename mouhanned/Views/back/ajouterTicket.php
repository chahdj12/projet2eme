<?php
require_once('../../Controller/TicketC.php');
$ticketC = new TicketC();
$reservations = $ticketC->afficherReservations();

if (
    isset($_POST["idReservation"]) &&
    isset($_POST["matricule"]) &&
    isset($_POST["prixTotale"])
) {
    $idReservation = $_POST["idReservation"];
    $matricule = $_POST["matricule"];
    $prixTotale = $_POST["prixTotale"];

    $ticket = new Ticket(0, $idReservation, $matricule, $prixTotale);

    $ticketC->ajouterTicket($ticket);

    header("Location: tickets.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Admin Dashboard</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="reservations.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Reservations
                        </a>
                        <a class="nav-link" href="tickets.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Tickets
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tickets</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Nouveau Ticket</li>
                    </ol>

                    <div class="container mt-5">
                        <form method="POST" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="idReservation">ID Reservation</label>
                                <select class="form-control" id="idReservation" name="idReservation">
                                    <?php
                                    // Assurez-vous que $reservations est défini avant cette boucle
                                    foreach ($reservations as $reservation) {
                                        $id = $reservation['id'];
                                        echo "<option value=\"$id\">$id</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="matricule">Matricule</label>
                                <input type="text" class="form-control" id="matricule" name="matricule">
                            </div>
                            <div class="form-group">
                                <label for="prixTotale">Prix Totale</label>
                                <input type="number" class="form-control" id="prixTotale" name="prixTotale">
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="tickets.php"><button class="btn btn-danger" type="button">Retour à la liste</button></a>
                        </form>

                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var idReservation = document.getElementById('idReservation').value;
            var matricule = document.getElementById('matricule').value;
            var prixTotale = document.getElementById('prixTotale').value;
            var intidReservation = parseInt(idReservation, 10);
            var intprixTotale = parseInt(prixTotale, 10);
            // Vérification que les champs ne sont pas vides
            if (idReservation === '' || matricule === '' || prixTotale === '') {
                alert('Veuillez remplir tous les champs.');
                return false;
            }

            // Vérification que idReservation et prixTotale sont des nombres positifs
            if (isNaN(idReservation) || isNaN(prixTotale) || intidReservation < 0 || intprixTotale < 0) {
                alert('Veuillez saisir des valeurs numériques valides et positives pour ID Reservation et Prix Totale.');
                return false;
            }

            // Autres validations peuvent être ajoutées en fonction de vos besoins

            return true; // Soumet le formulaire si la validation réussit
        }
    </script>


</body>

</html>