<?php
include '../controller/userC.php';
include '../model/user.php';
$error = "";

// create user
$user = null;
// create an instance of the controller
$userC = new userC();

if (
    isset($_POST["name"]) &&
    isset($_POST["last_name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["phone_number"]) &&
    isset($_POST["password"]) &&
    isset($_POST["date_of_birth"])
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST["last_name"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["phone_number"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["date_of_birth"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $user = new user(
            null,
            $_POST['name'],
            $_POST['last_name'],
            $_POST['email'],
            $_POST['phone_number'],
            $_POST['password'],
            $_POST['date_of_birth'],
            null
        );
        var_dump($user);
       
        $userC->updateUser($user, $_POST['idUser']);

        header('Location: listuser.php');
    } else {
        $error = "Missing information";
    }
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
    if (isset($_POST['idUser'])) {
        $user = $userC->showUser($_POST['idUser']);
       
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="idUser">User ID:</label></td>
                    <td>
                        <input type="text" id="idUser" name="idUser" value="<?php echo $_POST['idUser'] ?>" readonly />
                        <span id="errorIdUser" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td>
                        <input type="text" id="name" name="name" value="<?php echo $user['name_user'] ?>" />
                        <span id="errorName" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="last_name">Last Name:</label></td>
                    <td>
                        <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name_user'] ?>" />
                        <span id="errorLastName" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $user['email_user'] ?>" />
                        <span id="errorEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="phone_number">Phone Number:</label></td>
                    <td>
                        <input type="text" id="phone_number" name="phone_number" value="<?php echo $user['phonenbr_user'] ?>" />
                        <span id="errorPhoneNumber" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td>
                        <input type="password" id="password" name="password" value="<?php echo $user['password_user'] ?>" />
                        <span id="errorPassword" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="date_of_birth">Date of Birth:</label></td>
                    <td>
                        <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $user['date_of_birth_user'] ?>" />
                        <span id="errorDateOfBirth" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="Save">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>