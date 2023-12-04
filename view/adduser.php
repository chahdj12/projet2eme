<?php
include '../controller/userC.php';
include '../model/user.php';

$error = "";

$userC = new userC();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name_user'];
    $last_name = $_POST['last_name_user'];
    $email = $_POST['email_user'];
    $phone = $_POST['phonenbr_user'];
    $password = $_POST['password_user'];
    $date_of_birth = $_POST['date_of_birth_user'];

    if (!empty($name) && !empty($last_name) && !empty($email) && !empty($phone) && !empty($password) && !empty($date_of_birth)) {
        $user = new user(null, $name, $last_name, $password, $email, $phone, $date_of_birth, null);
        $userC->addUser($user);
        header('Location: listuser.php');
        exit;
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #container {
            width: 60%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        a:hover {
            color: #FFD700;
        }

        #error {
            color: red;
        }

        table {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #FFD700;
            color: #000;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #000;
            color: #FFD700;
        }

        td {
            padding: 10px;
        }
    </style>
</head>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('form').addEventListener('submit', function (event) {
                let isValid = true;

                // Password validation
                const password = document.getElementById('password_user').value;
                const errorPassword = document.getElementById('errorPassword');
                if (password.length < 8) {
                    errorPassword.textContent = 'Password must be at least 8 characters';
                    isValid = false;
                } else {
                    errorPassword.textContent = '';
                }

                // Email validation
                const email = document.getElementById('email_user').value;
                const errorEmail = document.getElementById('errorEmail');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    errorEmail.textContent = 'Invalid email format';
                    isValid = false;
                } else {
                    errorEmail.textContent = '';
                }

                // Phone number validation
                const phoneNumber = document.getElementById('phonenbr_user').value;
                const errorPhoneNumber = document.getElementById('errorPhoneNumber');
                const phoneNumberRegex = /^\d{8}$/;
                if (!phoneNumberRegex.test(phoneNumber)) {
                    errorPhoneNumber.textContent = 'Phone number must be 8 digits';
                    isValid = false;
                } else {
                    errorPhoneNumber.textContent = '';
                }

                // Name validation (you need to implement server-side uniqueness check)
                const name = document.getElementById('name_user').value;
                const errorName = document.getElementById('errorName');
                if (name.trim() === '') {
                    errorName.textContent = 'Name is required';
                    isValid = false;
                } else {
                    errorName.textContent = '';
                    // You should implement server-side check for name uniqueness here
                }

                if (!isValid) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });
        });
    </script>


<body>
    <div id="container">
        <a href="listuser.php">Back to list</a>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="name_user">Name:</label></td>
                    <td>
                        <input type="text" id="name_user" name="name_user" required />
                        <span id="errorName"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="last_name_user">Last Name:</label></td>
                    <td>
                        <input type="text" id="last_name_user" name="last_name_user" required />
                        <span id="errorLastName"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email_user">Email:</label></td>
                    <td>
                        <input type="text" id="email_user" name="email_user" required />
                        <span id="errorEmail"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="phonenbr_user">Phone Number:</label></td>
                    <td>
                        <input type="text" id="phonenbr_user" name="phonenbr_user" required />
                        <span id="errorPhoneNumber"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="password_user">Password:</label></td>
                    <td>
                        <input type="password" id="password_user" name="password_user" required />
                        <span id="errorPassword"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="date_of_birth_user">Date of Birth:</label></td>
                    <td>
                        <input type="date" id="date_of_birth_user" name="date_of_birth_user" required />
                        <span id="errorDateOfBirth"></span>
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
    </div>
</body>

</html>
