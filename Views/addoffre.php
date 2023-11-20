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
        $offre = new offre(
            null,
            $_POST['descoffre'],
            $_POST['localoffre'],
            $_POST['typeoffre']
        );
        $offreC->addoffre($offre);
        header('Location:listoffre.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Offres </title>
</head>

<body>
    <a href="listoffre.php">Back to list 1 </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="descoffre">Description d'offre:</label></td>
                <td>
                    <input type="text" id="descoffre" name="descoffre" />
                    <span id="erreurtype" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="localoffre">Localisation :</label></td>
                <td>
                    <input type="text" id="localoffre" name="localoffre" />
                    <span id="erreurlocal" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="typeoffre">Type offre:</label></td>
                <td>
                    <input type="text" id="typeoffre" name="typeoffre" />
                    <span id="erreurtypeoffres" style="color: red"></span>
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
</body>

</html>