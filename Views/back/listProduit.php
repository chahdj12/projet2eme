<?php
include "headerBack.php";

include "../../controller/produitC.php";
    $productC=new produitC();
    $list = $productC->afficheProduit();
?>
    <body class="sb-nav-fixed">
      
        <div id="layoutSidenav">
         
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">List Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Product</li>
                        </ol>
       
                        <div class="card mb-4">
                        <div class="card-header">
                                <!-- <button type="button" class="btn btn-primary m-1 float-right"><a href="register.php"></a><i class="fas fa-user-plus fa-lg"></i>&nbsp;&nbsp; Add New User</button> -->
                                <button class="btn btn-primary m-1 float-right"><a href="./addProduit.php"
                                    class="text-light">New Product</a>
                                </button><br>
                              
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            
                                            <th>Name</th>
                                
                                            <th> Description</th>
                                            <th> Stock</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php    foreach ($list as $row)  { ?>
                                        <tr>
                                            
                                            <td><?php    echo $row['name'] ?></td>
                                            <td><?php    echo $row['descriptionP'] ?></td>
                                            <td><?php    echo $row['stock'] ?></td>
                                            <td><?php    echo $row['prix'] ?></td>
                                            
                                            <td>
                                                <?php echo'
                                              <button class="btn btn-primary">
                                              <a href="./updateProduit.php?id='. $row['id_produit'].'" class="text-light">
                                                  <i class="fa fas fa-edit" ></i>
                                              </a>
                                          </button>
                                        
                                            <button class="btn btn-danger"><a href="./deleteProduit.php?deleteid=' . $row['id_produit'] . '" class="text-light"> <i class="fa fa-trash"></i>'

                                            ?>

                                            </td>
                                        </tr>

                                        <?php     } ?>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
