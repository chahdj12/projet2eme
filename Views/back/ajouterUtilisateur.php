<?php
session_start() ;

if (isset($_SESSION["username"]))
{
    if ($_SESSION["role_user"] == "USER_ROLE" )  header("location:../front/index.php") ;
} else {
    header("location:../front/index.php") ;
}

include_once '../../Model/Utilisateur.php';
include_once '../../Controller/UtilisateurC.php';


$utilisateurC = new UtilisateurC();

if (
    isset($_POST["nom_user"]) &&
    isset($_POST["prenom_user"]) &&
    isset($_POST["email_user"]) &&
    isset($_POST["tel_user"]) &&
    isset($_POST["adresse_user"]) &&
    isset($_POST["username"]) &&
    isset($_POST["password_user"]) &&
    isset($_POST["role_user"])
) {

    if (
        !empty($_POST["nom_user"]) &&
        !empty($_POST["prenom_user"]) &&
        !empty($_POST["email_user"]) &&
        !empty($_POST["tel_user"]) &&
        !empty($_POST["adresse_user"]) &&
        !empty($_POST["username"]) &&
        !empty($_POST["password_user"]) &&
        !empty($_POST["role_user"])
    ){
        $nom_user = $_POST['nom_user'] ;
        $prenom_user = $_POST['prenom_user'] ;
        $email_user = $_POST['email_user'] ;
        $tel_user = $_POST['tel_user'] ;
        $adresse_user = $_POST['adresse_user'] ;
        $username = $_POST['username'] ;
        $password_user = md5($_POST['password_user']) ;
        $role_user = $_POST['role_user'] ;

        $utilisateur = new Utilisateur($nom_user,
            $prenom_user,
            $email_user,
            $tel_user,
            $adresse_user,
            $username,
            $password_user,
            $role_user
        );/////////////

        $utilisateurC->ajouter_Utilisateur($utilisateur);
        header('Location: utilisateurs.php');
    }




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
        .error {
            color: red;
            font-size: 14px;
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
                    <h1 class="mt-4">Utilisateurs</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Nouveau utilisateur</li>
                    </ol>

                    <div class="container mt-5">
                    <form method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" name="nom_user" class="form-control" id="nom_user" >
                <div id="error_nom_user" class="error"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Prenom</label>
                <input type="text" class="form-control" name="prenom_user" id="prenom_user" placeholder="prenom user">
                <div id="error_prenom_user" class="error"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email_user" class="form-control" id="email_user">
                <div id="error_email_user" class="error"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tel</label>
                <input type="tel" class="form-control" name="tel_user" id="tel_user">
                <div id="error_tel_user" class="error"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Adresse</label>
                <input type="text" class="form-control" name="adresse_user" id="adresse_user" placeholder="adresse">
                <div id="error_adresse_user" class="error"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="username" >
                <div id="error_username" class="error"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password_user" id="password_user" placeholder="0000">
                <div id="error_password_user" class="error"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Role</label>
                <select class="form-control" name="role_user">
                    <option value="USER_ROLE">user</option>
                    <option value="ADMIN_ROLE">admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary me-2" name="submitbtn">Submit</button>
            <button class="btn btn-light">Cancel</button>
            <a href="Utilisateurs.php"><button class="btn btn-danger" type="button">Retour à la liste</button></a>
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
            // Reset error messages
            resetErrors();

            // Validation logic for each field
            var isValid = true;

            // Validate Nom
            var nomUser = document.getElementById('nom_user').value.trim();
            if (nomUser === '') {
                displayError('error_nom_user', 'Nom is required');
                isValid = false;
            }

            // Validate Prenom
            var prenomUser = document.getElementById('prenom_user').value.trim();
            if (prenomUser === '') {
                displayError('error_prenom_user', 'Prenom is required');
                isValid = false;
            }

            // Validate Email
            var emailUser = document.getElementById('email_user').value.trim();
            if (emailUser === '' || !isValidEmail(emailUser)) {
                displayError('error_email_user', 'Enter a valid email address');
                isValid = false;
            }

            // Validate Tel
            var telUser = document.getElementById('tel_user').value.trim();
            if (telUser === '' || !isValidPhoneNumber(telUser)) {
                displayError('error_tel_user', 'Enter a valid phone number');
                isValid = false;
            }

            // Validate Adresse
            var adresseUser = document.getElementById('adresse_user').value.trim();
            if (adresseUser === '') {
                displayError('error_adresse_user', 'Adresse is required');
                isValid = false;
            }

            // Validate Username
            var username = document.getElementById('username').value.trim();
            if (username === '') {
                displayError('error_username', 'Username is required');
                isValid = false;
            }

            // Validate Password
            var passwordUser = document.getElementById('password_user').value.trim();
            if (passwordUser === '') {
                displayError('error_password_user', 'Password is required');
                isValid = false;
            }

            return isValid;
        }

        function resetErrors() {
            var errorDivs = document.getElementsByClassName('error');
            for (var i = 0; i < errorDivs.length; i++) {
                errorDivs[i].innerText = '';
            }
        }

        function displayError(id, message) {
            var errorDiv = document.getElementById(id);
            if (errorDiv) {
                errorDiv.innerText = message;
            }
        }

        function isValidEmail(email) {
            // Basic email validation, you can enhance it as needed
            var emailRegex = /\S+@\S+\.\S+/;
            return emailRegex.test(email);
        }

        function isValidPhoneNumber(phoneNumber) {
            // Basic phone number validation, you can enhance it as needed
            var phoneRegex = /^\d{10}$/;
            return phoneRegex.test(phoneNumber);
        }
    </script>
</body>

</html>