<?php
//connection database

require_once '../../Model/Blog.php';
require_once '../../Controller/BlogC.php';
require_once '../../config.php';

$bc=new BlogC();
    //requet affichage lil tableau
    $blogs = $bc->listBlogs();

    //tithabat kan fama delete fil lien
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        //requet mita3 selection bich tithabit ili houwa mawjoud
        $blogToDelete =  $bc->getBlog($id);
        //tithabat kan mawjoud wala le
        if($blogToDelete)
        {
            //tfasa5a bil requet delete
            $bc->deleteBlog($id);
            //tbadal il lien b blog bich tfasa5 ?delete
            header("location: blog.php");
        }
        else{
            header("location: blog.php");
        }
    }

    $commentsCount = $bc->countCommentedBlogs();

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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                            <li class="breadcrumb-item active">Dashboard | Blog</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Blog
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Mail</th>
                                            <th>Date</th>
                                            <th>Contenue</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Mail</th>
                                            <th>Date</th>
                                            <th>Contenue</th>
                                            <th>Tools</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        //affichage mita3 tableau
                                        foreach($blogs as $blog){ ?>
                                        <tr>
                                            <td><?php echo $blog['id']?></td>
                                            <td><?php echo $blog['title']?></td>
                                            <td><?php echo $blog['mail']?></td>
                                            <td><?php echo $blog['date']?></td>
                                            <td><?php echo $blog['contenue']?></td>
                                            <td>
                                                <!-- button mita3 delete update -->
                                                <a href="blogUpdate.php?id=<?php echo $blog['id']?>" class="card bg-success text-white mb-2" >Updated</a>
                                                <a href="?delete=<?php echo $blog['id']?>" class="card bg-danger text-white mb-2">Delete</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <canvas id="likesChart" width="400" height="200"></canvas>
                        <script>
                            const chartCanvas = document.getElementById('likesChart').getContext('2d');

                            // Replace this with your own chart configuration based on your requirements
                            const chartConfig = {
                                type: 'bar',
                                data: {
                                    labels: ['Commented Blog',"Non Commented Blog"],
                                    datasets: [{
                                        label: 'Number',
                                        data: [<?php echo $commentsCount['commentedBlogs'] ?>,<?php echo $commentsCount['nonCommentedBlogs'] ?>],
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    },
                                    plugins: {
                                        title: {
                                            display: true,
                                            text: 'Commented Blogs Statistics', 
                                            font: {
                                                size: 16
                                            }
                                        }
                                    }
                                }
                            };

                            chartCanvas = new Chart(chartCanvas, chartConfig);
                        </script>
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
