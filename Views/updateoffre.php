<?php

include '../Controller/offreC.php';
include '../Model/offre.php';
$error = "";

// create client
$offre = null;
// create an instance of the controller
$offreC = new offreC();


if (
    isset($_POST["descoffre"]) &&
    isset($_POST["localoffre"]) &&
    isset($_POST["typeoffre"]) 
) {
    if (
        !empty($_POST['descoffre']) &&
        !empty($_POST["localoffre"]) &&
        !empty($_POST["typeoffre"]) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $offre = new offre(
            null,
            $_POST['descoffre'],
            $_POST['localoffre'],
            $_POST['typeoffre']
        );
        var_dump($offre);
        
        $offreC->updateoffre($offre, $_POST['idoffre']);

        header('Location:listoffre.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listoffre.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idoffre'])) {
        $offre = $offreC->showoffre($_POST['idoffre']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="idoffre">Id  offre :</label></td>
                    <td>
                        <input type="text" id="idoffre" name="idoffre" value="<?php echo $_POST['idoffre'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="descoffre">DESCRIPTION OFFRE:</label></td>
                    <td>
                        <input type="text" id="descoffre" name="descoffre" value="<?php echo $offre['descoffre'] ?>" />
                        <span id="erreurdesc" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="localoffre">localisation :</label></td>
                    <td>
                        <input type="text" id="localoffre" name="localoffre" value="<?php echo $offre['localoffre'] ?>" />
                        <span id="erreurlocal" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nbroffres">Type d'offre:</label></td>
                    <td>
                        <input type="text" id="typeoffre" name="nb" value="<?php echo $offre['typeoffre'] ?>" />
                        <span id="erreurtypeoffre" style="color: red"></span>
                    </td>
                </tr>
         

                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>