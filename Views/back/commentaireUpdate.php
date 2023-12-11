<?php

require_once '../../Model/commentaire.php';
require_once '../../Controller/CommentaireC.php';
require_once '../../config.php';

$cC = new CommentaireC();
//tithabat ili fil lien mawjoud il id wala le
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //tchouf fil base de donner kan mawjoud il id fil database wala le
    $commentaireToUpdate =  $cC->getCommentaire($id);
    //kan mouch mawjoud il id fil base de donner tbadal il url l blog.php
    if (!$commentaireToUpdate) {
        header("location: Commentaire.php");
    }
}

//kan nzilit 3al button update
if (isset($_POST['submit'])) {
    //thot les variables mita3 form
    $commentaire = new Commentaire(0, $_GET['id'], $_POST['comment_text'], $_POST['date'], $_POST['likes']);

    //ta3mil request update thot feha les variables
    $cC->updateCommentaire($commentaire, $_GET['id']);

    //tbadal il lien ba3d il update lil url l blog.php
    header("location: Commentaire.php");
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
    <?php require('navbar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Blog</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard | Blog | Update</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Form Update Blog
                        </div>
                        <div class="card-body">

                            <form method="post" class="tm-contact-form" onsubmit="return validateForm()">
                                <div class="col-lg-12 col-md-12 tm-contact-form-input">
                                    <div class="form-group">
                                        <input type="number" name="likes" value="<?php echo $commentaireToUpdate['likes']?>" id="like_input" class="form-control" placeholder="Likes" />
                                        <span id="likes_error" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="date" value="<?php echo $commentaireToUpdate['created_at']?>" id="date_input" class="form-control" placeholder="Date" />
                                        <span id="date_error" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="contenue_input" name="comment_text" class="form-control" rows="6" placeholder="Comment"><?php echo $commentaireToUpdate['comment_text']?></textarea>
                                        <span id="comment_error" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <button class="tm-submit-btn" type="submit" name="submit">Update</button>
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