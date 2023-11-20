<?php
require_once "../Controller/typeoffreC.php";

$typeoffreC= new typeoffreC();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['typeoffre'])&& isset($_POST['search'])){
        $idtype = $_POST['typeoffre'];
        $list = $typeoffreC->afficheoffres($idtype);
    }
}
$typeoffre= $typeoffreC->affichetype();
?>
<!DOCTYPE html>
<head> 
    <title> Recherche des offres </title>
</head>
    <body>
        <h1> Recherche des offres par type d'offre </h1>
        <form action="" method="POST" >
            <label for="typeoffre"> Sélectionnez un type d'offre : </label>
            <select name="typeoffre" id="typeoffre" >
                <?php
                foreach ($typeoffre as $typeoffre) {
                    echo '<option
                      value= "' . $typeoffre["idtype"] .'">' .$typeoffre["nomtype"] . '</option>';
                }

                ?>
            </select>

                <input type="submit" value="recherche" name="search" >
            </form>


            <?php 
            if(isset($list)) {?>
                <br> 
                <h2> Offres correspondants au type d'offres sélectionné: </h2>
                <ul>
                    <?php foreach ($list as $offre) 
                    {
                        ?>
                        <li><?= $offre['descoffre'] ?> - <?=$offre['localoffre'] ?></li>
                     <?php
                    } ?>
                    </ul>
                    <?php } ?>
    </body>
    </html>

       
        
                