<?php
require_once('../../Controller/TypeOffreC.php');
$typeOffreC = new TypeOffreC();

if (isset($_POST["nom"], $_POST["description"])) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];

    // Handle logo upload
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logoTmpName = $_FILES['logo']['tmp_name'];
        $logoName = $_FILES['logo']['name'];
        $logoDestination = '../uploads/' . $logoName; // Set the destination directory

        // Move the uploaded file to the destination
        move_uploaded_file($logoTmpName, $logoDestination);
    } else {
        $logoDestination = ''; // Set a default or handle the error as needed
    }

    $typeOffre = new TypeOffre(0, $nom, $description, $logoDestination);

    $typeOffreC->ajouterTypeOffre($typeOffre);

    header("Location: typeoffres.php");
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
                        <a class="nav-link" href="offres.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Offres
                        </a>
                        <a class="nav-link" href="typeoffres.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            types de offres
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
                    <h1 class="mt-4">Types de Offres</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Nouveau type de offres</li>
                    </ol>

                    <div class="container mt-5">
                        <form method="POST" enctype="multipart/form-data" onsubmit="return validateTypeForm()">
                            <div class="form-group">
                                <label for="nom">Nom du type d'offre</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description du type d'offre</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>

                            <div class="form-group">
                                <label for="logo">Logo du type d'offre</label>
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="typeoffres.php" class="btn btn-danger">Retour à la liste</a>
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
    function validateTypeForm() {
        // Récupération des valeurs des champs
        var nom = document.getElementById('nom').value;
        var description = document.getElementById('description').value;
        var logo = document.getElementById('logo').value;

        // Validation des champs
        if (nom === '' || description === '' || logo === '') {
            alert('Veuillez remplir tous les champs.');
            return false; // Empêche la soumission du formulaire
        }

        // Vous pouvez ajouter d'autres validations spécifiques, par exemple, vérifier le format du fichier logo.

        return true; // Autorise la soumission du formulaire
    }
</script>

</body>

</html>