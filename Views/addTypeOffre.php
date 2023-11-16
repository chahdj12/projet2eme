<?php

include '../Controller/typeoffreC.php';
include '../model/typeoffre.php';

$error = "";

// create client
$typeoffre = null;

// create an instance of the controller
$typeoffreC = new typeoffreC();
if (
    isset($_POST["nomType"]) &&
    isset($_POST["Logo"]) &&
    isset($_POST["nbrOffres"]) 
) {
    if (
        !empty($_POST['nomType']) &&
        !empty($_POST["Logo"]) &&
        !empty($_POST["nbrOffres"]) 
    ) {
        $typeoffre = new typeoffre(
            null,
            $_POST['nomType'],
            $_POST['Logo'],
            $_POST['nbrOffres']
        );
        $typeoffreC->addTypeOffre($typeoffre);
        header('Location:listTypeOffre.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joueur </title>
</head>

<body>
    <a href="listTypeOffre.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nomType" name="nomType" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Logo">Logo :</label></td>
                <td>
                    <input type="text" id="Logo" name="Logo" />
                    <span id="erreurLogo" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="nbrOffres">Nombre des offres :</label></td>
                <td>
                    <input type="text" id="nbrOffres" name="nbrOffres" />
                    <span id="erreurnbrOffres" style="color: red"></span>
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