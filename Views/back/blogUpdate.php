<?php

    require_once '../../Model/Blog.php';
    require_once '../../Controller/BlogC.php';
    require_once '../../config.php';

$bc=new BlogC();
//tithabat ili fil lien mawjoud il id wala le
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //tchouf fil base de donner kan mawjoud il id fil database wala le
        $blogToUpdate =  $bc->getBlog($id);
        //kan mouch mawjoud il id fil base de donner tbadal il url l blog.php
        if(!$blogToUpdate)
        {
            header("location: blog.php");
        }
    }

    //kan nzilit 3al button update
    if (isset($_POST['submit'])) {
        //thot les variables mita3 form
        $blog = new Blog($_POST['titre'],$_POST['mail'],$_POST['date'],$_POST['contenue']);

        //ta3mil request update thot feha les variables
        $bc->updateBlog($blog,$_GET['id']);
        
        //tbadal il lien ba3d il update lil url l blog.php
        header("location: blog.php");
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
                        <li><hr class="dropdown-divider" /></li>
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
                                        <input type="text" value="<?php echo $blogToUpdate['title']?>" name="titre" id="contact_title" class="form-control" placeholder="Titre" />
                                        <span id="titre_error" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" value="<?php echo $blogToUpdate['mail']?>" name="mail" id="contact_email" class="form-control" placeholder="Mail" />
                                        <span id="mail_error" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" value="<?php echo $blogToUpdate['date']?>" name="date" id="contact_date" class="form-control" placeholder="Date" />
                                        <span id="date_error" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="contact_contenue" name="contenue" class="form-control" rows="6" placeholder="Contenue"><?php echo $blogToUpdate['contenue']?></textarea>
                                        <span id="contenue_error" style="color: red;"></span>
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
								const titre = document.getElementById('title_input').value;
								if (titre === '') {
									document.getElementById('titre_error').textContent = 'Titre is required';
									isValid = false;
								} else {
									document.getElementById('titre_error').textContent = '';
								}

								const mail = document.getElementById('contact_email').value;
								const mailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
								if (mail === '') {
									document.getElementById('mail_error').textContent = 'Mail is required';
									isValid = false;
								} else if (!mailRegex.test(mail)) {
									document.getElementById('mail_error').textContent = 'Invalid email format';
									isValid = false;
								} else {
									document.getElementById('mail_error').textContent = '';
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
									document.getElementById('contenue_error').textContent = 'Contenue is required';
									isValid = false;
								} else {
									document.getElementById('contenue_error').textContent = '';
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
