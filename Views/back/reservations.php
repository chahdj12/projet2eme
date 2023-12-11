<?php
require_once("../../Controller/ReservationC.php");
$reservationC = new reservationC();
$reservations = $reservationC->afficherReservations();


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
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <?php require_once('navbar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Reservations</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">gestion de reservations</li>
                    </ol>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fas fa-table me-1"></i>
                                    Liste de réservations
                                </h5>
                                <a href="ajouterReservation.php">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addReservationModal">
                                        <i class="fas fa-plus me-1"></i> Ajouter
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID User</th>
                                        <th>Type de Paiement</th>
                                        <th>Nombre de Personnes</th>
                                        <th>Date de Début</th>
                                        <th>Date de Fin</th>
                                        <th>Nombre de Chambres</th>
                                        <th>Type de Pension</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>ID</th>
                                        <th>ID User</th>
                                        <th>Type de Paiement</th>
                                        <th>Nombre de Personnes</th>
                                        <th>Date de Début</th>
                                        <th>Date de Fin</th>
                                        <th>Nombre de Chambres</th>
                                        <th>Type de Pension</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
            <?php foreach ($reservations as $reservation) { ?>
                <tr>
                    <td><?= $reservation['id'] ?></td>
                    <td><?= $reservation['idUser'] ?></td>
                    <td><?= $reservation['typePaiement'] ?></td>
                    <td><?= $reservation['nbrPersonnes'] ?></td>
                    <td><?= $reservation['dateDebut'] ?></td>
                    <td><?= $reservation['dateFin'] ?></td>
                    <td><?= $reservation['nbrChambres'] ?></td>
                    <td><?= $reservation['typePension'] ?></td>
                    <td>
                        <a href="modifierReservation.php?id=<?= $reservation['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="supprimerReservation.php?id=<?= $reservation['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
                            </table>
                        </div>
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
</body>

</html>