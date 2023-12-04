<?php
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
    <style>
        .error-message {
    color: red;
    font-size: 12px;
    margin-top: 5px;
}

        </style>
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
                        <a class="nav-link" href="livraisons.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Livraison
                        </a>
                        <a class="nav-link" href="typelivraisons.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            types de Livraison
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
                    <h1 class="mt-4">Livraisons</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Nouvelle livraison</li>
                    </ol>

                    <div class="container mt-5">
                        <form method="POST" id="f"  onsubmit="return validateForm(event)">
                            
                            

                            <div class="form-group">
    <label for="idPartenaire">ID Partenaire</label>
    <input type="number" class="form-control" id="idPartenaire" name="idPartenaire">
    <div class="error-message" id="idPartenaire-error"></div>
</div>

<div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date">
    <div class="error-message" id="date-error"></div>
</div>

<div class="form-group">
    <label for="livraison">Livraison</label>
    <input type="text" class="form-control" id="livraison" name="livraison">
    <div class="error-message" id="livraison-error"></div>
</div>

<div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type">
                                    <?php foreach ($types as $type) : ?>
                                        <option value="<?= $type['id'] ?>"><?= $type['nom'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

<div class="form-group">
    <label for="adresse">Adresse</label>
    <input type="text" class="form-control" id="adresse" name="adresse">
    <div class="error-message" id="adresse-error"></div>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <input type="text" class="form-control" id="status" name="status">
    <div class="error-message" id="status-error"></div>
</div>

<div class="form-group">
    <label for="numero">Numéro</label>
    <input type="text" class="form-control" id="numero" name="numero">
    <div class="error-message" id="numero-error"></div>
</div>


                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="livraisons.php"><button class="btn btn-danger" type="button">Retour à la liste</button></a>
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
    <script>
function validateForm(event) {
    event.preventDefault(); // Prevent the form from submitting by default
    var idPartenaire = document.getElementById('idPartenaire').value;
    var date = document.getElementById('date').value;
    var livraison = document.getElementById('livraison').value;
    var adresse = document.getElementById('adresse').value;
    var status = document.getElementById('status').value;
    var numero = document.getElementById('numero').value;

    // Réinitialisez les messages d'erreur
    document.getElementById('idPartenaire-error').innerHTML = '';
    document.getElementById('date-error').innerHTML = '';
    document.getElementById('livraison-error').innerHTML = '';
    document.getElementById('adresse-error').innerHTML = '';
    document.getElementById('status-error').innerHTML = '';
    document.getElementById('numero-error').innerHTML = '';

    var isValid = true;

    // Vérifiez vos conditions de validation et affichez les messages d'erreur appropriés
    if (idPartenaire === '') {
        document.getElementById('idPartenaire-error').innerHTML = 'Veuillez saisir l\'ID Partenaire.';
        return false;
    }

    if (date === '') {
        document.getElementById('date-error').innerHTML = 'Veuillez saisir la date.';
        return false;
    }

    if (livraison === '') {
        document.getElementById('livraison-error').innerHTML = 'Veuillez saisir la livraison.';
        return false;
    }

    if (type === '') {
        document.getElementById('type-error').innerHTML = 'Veuillez sélectionner le type.';
        return false;
    }

    if (adresse === '') {
        document.getElementById('adresse-error').innerHTML = 'Veuillez saisir l\'adresse.';
        return false;
    }

    if (status === '') {
        document.getElementById('status-error').innerHTML = 'Veuillez saisir le status.';
        return false;
    }

    if (numero === '') {
        document.getElementById('numero-error').innerHTML = 'Veuillez saisir le numéro.';
        return false;
    }
    document.getElementById('f').submit(); 
    return true;
}

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    

</body>

</html>