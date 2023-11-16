<?php
include "../controller/usercontroller.php";

$c = new usercontroller();
$tab = $c->listuser();

?>

<center>
    <h1>List of users</h1>
    <h2>
        <a href="adduser.php">Add user</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id user</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>
        <th>password</th>
        <th>date</th>
        <th>role</th>
        <th>status</th>
        <th>code</th>
        <th>delete</th>
        <th>update</th>
    </tr>


    <?php
    foreach ($tab as $user) {
    ?>




        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['name']; ?></td>
            <td><?= $user['last name']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['phonenbr']; ?></td>
            <td><?= $user['password']; ?></td>
            <td><?= $user['status']; ?></td>
            <td><?= $user['role']; ?></td>
            <td><?= $user['dateofbirth']; ?></td>
            <td><?= $user['code']; ?></td>

            <td align="center">
                <form method="POST" action="updateuser$user.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $user['id']; ?> name="iduser$user">
                </form>
            </td>
            <td>
                <a href="deleteuser$user.php?id=<?php echo $user['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>