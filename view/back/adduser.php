<?php

include '../Controller/usercontroller.php';
include '../model/usermodel.php';

$error = "";

// create client
$user = null;

// create an instance of the controller
$userc = new usercontroller();
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
)
    
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
    empty($_POST["password"]))
 {
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
            
        $userc->adduser($user);
        header('Location:listuser.php');
    } else
        $error = "Missing information";



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joueur </title>
</head>

<body>
    <a href="listJoueurs.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="name">name :</label></td>
                <td>
                    <input type="text" id="name" name="name" />
                    <span id="erreurame" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="lastname">last name :</label></td>
                <td>
                    <input type="text" id="last name" name ="last name" />
                    <span id="erreurPrenom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td>
                    <input type="text" id="email" name="email" />
                    <span id="erreurEmail" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="phonenbr ">phonenbr  :</label></td>
                <td>
                    <input type="text" id="phonenbr " name="phonebr" />
                    <span id="erreurTelephone" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="dateofbirth ">dateofbirth  :</label></td>
                <td>
                    <input type="text" id="dateofbirth" name="dateofbirth" />
                    <span id="erreurdate" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="role ">role  :</label></td>
                <td>
                    <input type="text" id="role " name="role" />
                    <span id="erreurrole" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="status">status  :</label></td>
                <td>
                    <input type="text" id="status " name="status" />
                    <span id="erreurstatus" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="gendre ">gendre :</label></td>
                <td>
                    <input type="text" id="gendre " name="gendre" />
                    <span id="erreurTelephone" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="code ">code :</label></td>
                <td>
                    <input type="text" id="code " name="code" />
                    <span id="erreurcode" style="color: red"></span>
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