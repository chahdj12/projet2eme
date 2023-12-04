<?php
include "../controller/userC.php";

$c = new userC();
$userList = $c->listUsers(); 

?>

<center>
    <h1>List of Users</h1>
    <h2>
        <a href="addUser.php">Add User</a>
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
    foreach ($userList as $user) {
    ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['nom']; ?></td>
            <td><?= $user['prenom']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['tel']; ?></td>
            <td align="center">
                <form method="POST" action="updateUser.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $user['id']; ?> name="userId">
                </form>
            </td>
            <td>
                <a href="deleteUser.php?id=<?php echo $user['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
