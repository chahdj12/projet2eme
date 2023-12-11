<?php
require_once('../../Controller/LivraisonC.php');
$livraisonC  = new LivraisonC();

if (isset($_GET['id'])) {
    $livraison = $livraisonC->getLivraisonById($_GET['id']);
    var_dump($livraison);
}

if (
    isset($_POST["idPartenaire"]) &&
    isset($_POST["date"]) &&
    isset($_POST["type"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["status"]) &&
    isset($_POST["numero"])
) {
    $idPartenaire = $_POST["idPartenaire"];
    $date = $_POST["date"];
    $type = $_POST["type"];
    $adresse = $_POST["adresse"];
    $status = $_POST["status"];
    $numero = $_POST["numero"];
    $id = $_POST["id"];
   

    $livraison = new Livraison($id, $idPartenaire, $date, $type, $adresse, $status, $numero);
    $livraisonC->modifierLivraison($livraison);

    header("Location:livraisons.php");
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


                    <div class="container mt-5"">
                    <form method="post" action="" onsubmit="return validateForm()">
                        <input name="id" value="<?= $livraison['id'] ?>">

                        <div class="form-group">
                            <label for="idPartenaire">ID Partenaire</label>
                            <input type="number" class="form-control" id="idPartenaire" name="idPartenaire" value="<?= $livraison['idPartenaire'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?= $livraison['date'] ?>" required>
                        </div>


                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type" name="type" value="<?= $livraison['type'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $livraison['adresse'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Statut</label>
                            <input type="text" class="form-control" id="status" name="status" value="<?= $livraison['status'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="numero">Numéro</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="<?= $livraison['numero'] ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <a href="livraisons.php" class="btn btn-danger">Retour à la liste</a>
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


</body>

</html>