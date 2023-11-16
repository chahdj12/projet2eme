<?php
    require_once '../config/config.php';  
    $pdo = config::getConnexion();
//tithabat ili fil lien mawjoud il id wala le
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //tchouf fil base de donner kan mawjoud il id fil database wala le
        $selectQueryTodelete = $pdo->prepare('SELECT * FROM blog WHERE id = ?');
        $selectQueryTodelete->execute([$id]);
        $blogToUpdate =  $selectQueryTodelete->fetch();
        //kan mouch mawjoud il id fil base de donner tbadal il url l blog.php
        if(!$blogToUpdate)
        {
            header("location: blog.php");
        }
    }

    //kan nzilit 3al button update
    if (isset($_POST['submit'])) {
        //thot les variables mita3 form
        $titre = $_POST['titre'];
        $mail = $_POST['mail'];
        $date = $_POST['date'];
        $contenue = $_POST['contenue'];

        //ta3mil request update thot feha les variables
        $updateQuery = $pdo->prepare('UPDATE blog SET title = ?, mail = ?, date = ?, contenue = ? WHERE id = ?');
        $updateQuery->execute([
            $titre, 
            $mail, 
            $date, 
            $contenue,
            $id
        ]);
        
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
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="blog.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Blog
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
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
                                    </div>
                                    <div class="form-group">
                                        <input type="email" value="<?php echo $blogToUpdate['mail']?>" name="mail" id="contact_email" class="form-control" placeholder="Mail" />
                                    </div>
                                    <div class="form-group">
                                        <input type="date" value="<?php echo $blogToUpdate['date']?>" name="date" id="contact_date" class="form-control" placeholder="Date" />
                                    </div>
                                    <div class="form-group">
                                        <textarea id="contact_contenue" name="contenue" class="form-control" rows="6" placeholder="Contenue"><?php echo $blogToUpdate['contenue']?></textarea>
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
                                    let ErrorMessage = "";
                                    const titre = document.getElementById('contact_title').value;
                                    if (titre === '') {
                                        ErrorMessage = 'Titre is required';
                                        isValid = false;
                                    }

                                    const mail = document.getElementById('contact_email').value;
                                    const mailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                    if (mail === '') {
                                        ErrorMessage = 'Mail is required';
                                        isValid = false;
                                    } else if (!mailRegex.test(mail)) {
                                        ErrorMessage = 'Invalid email format';
                                        isValid = false;
                                    }

                                    const date = document.getElementById('contact_date').value;
                                    if (date === '') {
                                        ErrorMessage = 'Date is required';
                                        isValid = false;
                                    }

                                    const contenue = document.getElementById('contact_contenue').value;
                                    if (contenue === '') {
                                        ErrorMessage = 'Contenue is required';
                                        isValid = false;
                                    }
                                    if(isValid === false)
                                    {
                                        alert(ErrorMessage);
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
