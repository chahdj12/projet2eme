<?php


include "../../controller/SmallBController.php";
include "../../controller/produitC.php";
    $smallBController = new SmallBController();
    $list = $smallBController->afficherSmallB();
    $productC=new produitC();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <body class="sb-nav-fixed">
      
        <div style="width:1900px;" id="layoutSidenav">
         
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">List Small Buisness</h1>
                    
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" width="39%" cellspacing="5"  >
                                    <thead>
                                        <tr>
                                            
                                            <th>Name</th>
                                            <th>Categorie</th>
                                            <th>Location</th>
                                            <th> Description</th>
                                            <th> Product</th>
                                            <th>Logo</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php    foreach ($list as $row)  { ?>
                                        <tr>
                                            
                                            <td><?php    echo $row['nameS'] ?></td>
                                            <td><?php    echo $row['categorie'] ?></td>
                                            <td><?php    echo $row['lieu'] ?></td>
                                            <td><?php    echo $row['descriptionS'] ?></td>
                                            <td><?php    echo $productC->getProcuctByiD($row['produit'])['name'] ?></td>
                                            <td><img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents('http://localhost/projetWeb2eme/view/back/uploads/' . $row['logo'])); ?>" alt="Logo" width="100" height="100"></td>                                        </tr>

                                        <?php     } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>


    </body>
</html>
