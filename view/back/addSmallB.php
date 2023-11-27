<?php
ob_start();
include "headerBack.php";

include "../../controller/SmallBController.php";
include "../../controller/produitC.php";
    $err="";
        $name="";
        $categorie="";
        $lieu="";
        $descriptionS="";
        $logo="";

        $produitC= new produitC();
        $listeProduit=$produitC->afficheProduit();
       
        
    if(isset($_POST['submit']) )
	{
        var_dump($_FILES["logo"]);
        if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["logo"]["name"]);
            $uploadOk = true;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
            // Check if the file already exists
            if (file_exists($targetFile)) {
                $err= "Sorry, the file already exists.";
                $uploadOk = false;
            }
    
            // Check file size (adjust as needed)
            if ($_FILES["logo"]["size"] > 500000) {
                $err= "Sorry, your file is too large.";
                $uploadOk = false;
            }
    
            // Allow only certain file formats (you can customize this list)
            $allowedFormats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                $uploadOk = false;
            }
    
            // Check if $uploadOk is set to false by an error
            if (!$uploadOk) {
                $err= "Sorry, your file was not uploaded.";
            } else {
                
                // Move the file to the specified directory
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile)) {
                    $err= "The file " . htmlspecialchars(basename($_FILES["logo"]["name"])) . " has been uploaded.";
                
                     $name=$_POST['nameS'];
                    $categorie=$_POST['categ'];
                    $lieu=$_POST['lieu'];
                    $descriptionS=$_POST['Desc'];
                    $id_produit=$_POST['product'];
                    $logo=$_FILES["logo"]["name"];
                    $smallB=new SmallBuisness($name,$categorie,$lieu,$descriptionS,$id_produit,$logo);
                    $smallBController = new SmallBController();
                    $smallBController->ajouterSmallB($smallB);
                } else {
                    $err= "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $err= "Please select a file to upload.";
        }
       
       // var_dump($id_produit) ;

        ob_end_flush();
        // header("Location: listSmallBuisness.php");
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">New Small Buisness</h3></div>
                                    <div class="card-body">
                                        <form method="POST"  class="env" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputName" type="text"  name="nameS"  placeholder="Enter Buisness  name" />
                                                        <label for="inputName">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputCategorie" type="text"  name="categ" placeholder="Enter Buisness  categorie" />
                                                        <label for="inputCategorie">Categorie</label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputdescription" type="text"  name="Desc" placeholder="Enter Buisness  description" />
                                                    <label for="inputDesc">Description</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                   
                                                    <select class="form-control" id="pet-select" name="product">
                                                    <option value="">Product</option>
                                                    <?php    foreach ($listeProduit as $row)  { ?>
                                                        <option value="<?php echo $row["id_produit"] ?>"><?php echo $row["name"] ?></option>
                                                        <?php } ?>
                                                       
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputLocation" type="text" name="lieu"  placeholder="Enter Buisness  location" />
                                                        <label for="inputLogo">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputLogo" type="file" name="logo"  placeholder="Enter Buisness  logo" accept="image/*"/>
                                                        <label for="inputLogo">Logo</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                                <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="submit">Save</button></div>
                                                <p id="error"></p>
                                                <p><?php echo $err ?></p>
                                                </div>
                                            </form> 
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="listSmallBuisness.php">Cancel</a></div>
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
        <script src="./js/controleSmallB.js"></script>

        <!-- <script src="./js/controleSaisie.js"></script> -->
         <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="js/scripts.js"></script>  -->
    </body>