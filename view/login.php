<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>

    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #000;
        }

        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #000;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #FFD700;
            color: #000;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #000;
            color: #FFD700;
        }

        #error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div id="container">
        <h2 style="text-align: center; color: #FFD700;">Login Form</h2>

        <?php
        $error = ""; // Initialize $error
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Your existing PHP login logic
            // ...
        }
        ?>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="" method="POST">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required />

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required />

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />

            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>
