<?php

include '../Controller/typeoffreC.php';
include '../Model/typeoffre.php';
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
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $joueur = new typeoffre(
            null,
            $_POST['nomtype'],
            $_POST['logo'],
            $_POST['nbroffres']
        );
        var_dump($typeoffre);
        
        $typeoffreC->updatetypeoffre($typeoffre, $_POST['idtype']);

        header('Location:listtypeoffre.php');
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
    <button><a href="listtypeoffre.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idtype'])) {
        $typeoffre = $typeoffreC->showtypeoffre($_POST['idtype']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="id">Id type offre :</label></td>
                    <td>
                        <input type="text" id="idtype" name="idtype" value="<?php echo $_POST['idtype'] ?>" readonly />
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
                    <td><label for="logo">logo :</label></td>
                    <td>
                        <input type="text" id="logo" name="logo" value="<?php echo $typeoffre['logo'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nbroffres">Nombre des offres:</label></td>
                    <td>
                        <input type="text" id="nbroffres" name="nbroffres" value="<?php echo $typeoffre['nbroffres'] ?>" />
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