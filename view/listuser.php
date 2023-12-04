<?php
include "../controller/UserC.php";

$c = new UserC();
$users = $c->listUsers();

?>

<center>
    <h1>List of users</h1>
    <h2>
        <a href="addUser.php">Add user</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>

    <?php
    foreach ($users as $user) {
    ?>
        <tr>
            <td><?= $user['id_user']; ?></td>
            <td><?= $user['name_user']; ?></td>
            <td><?= $user['last_name_user']; ?></td>
            <td><?= $user['email_user']; ?></td>
            <td><?= $user['phonenbr_user']; ?></td>
            <td align="center">
                <form method="POST" action="updateUser.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value="<?= $user['id_user']; ?>" name="idUser">
                </form>
            </td>
            <td>
                <a href="deleteUser.php?id=<?= $user['id_user']; ?>">Delete</a>
            </td>
        </tr>
        <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            color: #FFD700;
            text-align: center;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        a:hover {
            color: #FFD700;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #FFD700;
            color: #000;
        }

        tr:nth-child(even) {
            background-color: #fff;
        }

        tr:nth-child(odd) {
            background-color: #F0F0F0;
        }

        form {
            display: inline;
        }

        input[type="submit"] {
            background-color: #FFD700;
            color: #000;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #000;
            color: #FFD700;
        }
    </style>
    <?php
    }
    ?>
</table>


