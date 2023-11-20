<?php

include '../Controller/typeoffreC.php';
include '../model/typeoffre.php';

$error = "";

// create client
$typeoffre = null;

// create an instance of the controller
$typeoffreC = new typeoffreC();
if (
    isset($_POST["nomtype"]) &&
    isset($_POST["logo"]) &&
    isset($_POST["nbroffres"])
) {
    if (
        !empty($_POST['nomtype']) &&
        !empty($_POST["logo"]) &&
        !empty($_POST["nbroffres"])
    ) {
        $typeoffre = new typeoffre(
            null,
            $_POST['nomtype'],
            $_POST['logo'],
            $_POST['nbroffres']
        );
        $typeoffreC->addtypeoffre($typeoffre);
        header('Location:listtypeoffre.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Types D'offres </title>
</head>

<body>
    <a href="listtypeoffre.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nomtype">Nom de Type:</label></td>
                <td>
                    <input type="text" id="nomtype" name="nomtype" />
                    <span id="erreurnom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="logo">Logo de Type d'offres:</label></td>
                <td>
                    <input type="text" id="logo" name="logo" />
                    <span id="erreurlogo" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="nbroffres">nombre d'offres:</label></td>
                <td>
                    <input type="text" id="nbroffres" name="nbroffres" />
                    <span id="erreurnbroffres" style="color: red"></span>
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