<?php
include "../controller/typeoffreC.php";

$c = new typeoffreC();
$tab = $c->listtypeoffre();

?>

<center>
    <h1>La liste des offres</h1>
    <h2>
        <a href="addtypeoffre.php">AJOUT DE TYPE D'OFFRFE</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id de Type offre</th>
        <th>Nom Type d'offre</th>
        <th>Logo de type d'offre</th>
        <th>nombres des offres dans ce type </th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $typeoffre) {
    ?>




        <tr>
            <td><?= $typeoffre['idtype']; ?></td>
            <td><?= $typeoffre['nomtype']; ?></td>
            <td><?= $typeoffre['logo']; ?></td>
            <td><?= $typeoffre['nbroffres']; ?></td>
            
            <td align="center">
                <form method="POST" action="updatetypeoffre.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $typeoffre['idtype']; ?> name="idtypeoffre">
                </form>
            </td>
            <td>
                <a href="deletetypeoffre.php?id=<?php echo $typeoffre['idtype']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>