<?php

include '../Controller/usercontroller.php';
include '../model/usermodel.php';
$error = "";

// create client
$user = null;
// create an instance of the controller
$usercontroller = new usercontroller();


if (
    isset($_POST["name"]) &&
    isset($_POST["last name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["phonenbr"])&&
    isset($_POST["bateofbirth"])&&
    isset($_POST["gendre"])&&
    isset($_POST["code"])&&
    isset($_POST["role"])&&
    isset($_POST["status"])&&
    isset($_POST["password"])
) {
    if (
        empty($_POST["name"]) &&
        empty($_POST["last name"]) &&
        empty($_POST["email"]) &&
        empty($_POST["phonenbr"])&&
        empty($_POST["bateofbirth"])&&
        empty($_POST["gendre"])&&
        empty($_POST["code"])&&
        empty($_POST["role"])&&
        empty($_POST["status"])&&
        empty($_POST["password"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $user = new user(
            null,
            $_POST["name"],
            $_POST["last name"] ,
            $_POST["email"],
            $_POST["phonenbr"],
            $_POST["bateofbirth"],
            $_POST["gendre"],
            $_POST["code"],
            $_POST["role"],
            $_POST["status"],
            $_POST["password"]
        );
        var_dump($user);
        
        $usercontroller->updateuseruser($user, $_POST['nameuser']);

        header('Location:listJoueurs.php');
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
    <button><a href="listuser.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if ([isset($nameuser')])) {
        $user = [$usercontroller->showJoueur($nameuser']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">iduser$user :</label></td>
                    <td>
                        <input type="texnameuser
            "nameuser
            " value="<?php echo $nameuser
            '] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $user['name'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $user['lastname'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $user['email'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="telephone">Téléphone :</label></td>
                    <td>
                        <input type="text" id="telephone" name="tel" value="<?php echo $user['phonenbr'] ?>" />
                        <span id="erreurTelephone" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                <td><label for="telephone">Téléphone :</label></td>
                <td>
                    <input type="text" id="telephone" name="tel" value="<?php echo $user['code'] ?>" />
                    <span id="erreurTelephone" style="color: red"></span>
                </td>
                </tr>
                <tr>
                <td><label for="telephone">Téléphone :</label></td>
                <td>
                    <input type="text" id="telephone" name="tel" value="<?php echo $user['role'] ?>" />
                    <span id="erreurTelephone" style="color: red"></span>
                </td>
                <tr>
                <td><label for="telephone">Téléphone :</label></td>
                <td>
                    <input type="text" id="telephone" name="tel" value="<?php echo $user['dateofbirth'] ?>" />
                    <span id="erreurTelephone" style="color: red"></span>
                </td>
                <tr>
                <td><label for="telephone">Téléphone :</label></td>
                <td>
                    <input type="text" id="telephone" name="tel" value="<?php echo $user['status'] ?>" />
                    <span id="erreurTelephone" style="color: red"></span>
                </td>
            </tr>
            </tr>

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