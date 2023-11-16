<?php

include '../Controller/typeoffreC.php';
include '../model/typeoffre.php';
$error = "";

// create client
$typeoffre = null;
// create an instance of the controller
$typeoffreC= new typeoffreC();


if (
    isset($_POST["nomType"]) &&
    isset($_POST["Logo"]) &&
    isset($_POST["nbrType"]) 
) {
    if (
        !empty($_POST['nomType']) &&
        !empty($_POST["Logo"]) &&
        !empty($_POST["nbrOffres"]) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $joueur = new typeoffre(
            null,
            $_POST['nomType'],
            $_POST['Logo'],
            $_POST['nbrOffres']
        );
        var_dump($typeoffre);
        
        $joueurC->updatetypeoffre($typeoffre, $_POST['idType']);

        header('Location:listTypeOffre.php');
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
    <button><a href="listTypeOffres.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idType'])) {
        $joueur = $typeoffreC->showoffres($_POST['idType']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">IdType :</label></td>
                    <td>
                        <input type="text" id="idType" name="idType" value="<?php echo $_POST['idType'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $typeoffre['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="Logo">Logo offre :</label></td>
                    <td>
                        <input type="text" id="Logo" name="Logo" value="<?php echo $typeoffre['Logo'] ?>" />
                        <span id="erreurLogo" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nbrOffres">nombre des offres:</label></td>
                    <td>
                        <input type="text" id="nbrOffres" name="nbrOffres" value="<?php echo $typeoffre['nbrOffres'] ?>" />
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
    <?php
    }
    ?>
</body>

</html>