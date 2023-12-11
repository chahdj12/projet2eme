
<?php
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
    $idUser =  $_POST["idUser"];

    $reservation = new Reservation(0, $idUser, $typePaiement, $nbrPersonnes, $dateDebut, $dateFin, $nbrChambres, $typePension);

    $id = $reservationC->ajouterReservation2($reservation);
    

    header("Location:reservations.php");
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
                        <li class="breadcrumb-item active">nouveau reservation</li>
                    </ol>


                    <div class="container mt-5">
                    <form method="POST" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="idUser">id User</label>
                        <input type="number" class="form-control" id="idUser" name="idUser" >
                    </div>
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
                    <a href="reservations.php"><button class="btn btn-danger" type="button">retour a la liste</button></a>
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

</body>

</html>