<?php
ob_start();
include "headerBack.php";


include "../../controller/produitC.php";
$id = $_GET['id'];
        $name="";
       
        $descriptionP="";
        $stock=0;
        $prix=0;

        $produitC= new produitC();
        $row=$produitC->getProcuctByiD($id);
        
            $name=$row['name'];
       
            $descriptionP=$row['descriptionP'];
            $stock=$row['stock'];
            $price=$row['prix'];
        
    if(isset($_POST['submit']) )
	{
        $idP=$_POST['idP'];
        $name=$_POST['nameP'];
       
        $descriptionP=$_POST['desc'];
        $stock=$_POST['stock'];
        $price=$_POST['price'];
        $produit=new produit($name,$descriptionP,$stock,$price);
        $produitC = new produitC();
        $produitC->modifierproduit($produit,$idP);
       // var_dump($id_produit) ;

        ob_end_flush();
        header("Location: listProduit.php");
        exit();        
    }
		
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>small BUSINESS</title>
</head> 
<body class="sb-nav-fixed">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">New Small Product</h3></div>
                                    <div class="card-body">
                                        <form method="POST"  class="env">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputName" type="text"  name="nameP"  placeholder="Enter Product  name" value="<?php echo $name ?>" />
                                                        <label for="inputName">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputDescription" type="text"  name="desc" placeholder="Enter Product  Description" value="<?php echo $descriptionP ?>"/>
                                                        <label for="inputDescription">Description</label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputStock" type="number" name="stock"  placeholder="Enter Product  stock" value="<?php echo $stock ?>"/>
                                                        <label for="inputStock">Stock</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPrice" type="number" name="price"  placeholder="Enter Product  price" value="<?php echo $price ?>"/>
                                                        <label for="inputPrice">Price</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                                <div class="mt-4 mb-0">
                                                <input type="hidden" name="idP" value="<?php echo $id?>">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="submit">Save</button></div>
                                                <p id="error"></p>
                                               
                                                </div>
                                            </form> 
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="listProduit.php">Cancel</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        <script src="./js/controleSaisie.js"></script>
         <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="js/scripts.js"></script>  -->
    </body>