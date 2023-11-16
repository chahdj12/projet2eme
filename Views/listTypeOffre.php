<?php
include "../controller/typeoffreC.php";

$c = new JoueurC();
$tab = $c->listTypeOffre();

?>

<center>
    <h1>List of Types of Offres</h1>
    <h2>
        <a href="addTypeOffre.php">Add type Offre</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Type Offre</th>
        <th>Nom Type d'offre </th>
        <th>Logo de Type d'offre</th>
        <th>nombre des offres dans type d'offre </th>
    
    </tr>


    <?php
    foreach ($tab as $typeoffre) {
    ?>




        <tr>
            <td><?= $typeoffre['idType']; ?></td>
            <td><?= $typeoffre['nomType']; ?></td>
            <td><?= $typeoffre['Logo']; ?></td>
            <td><?= $typeoffre['nbrOffre']; ?></td>
          
            <td align="center">
                <form method="POST" action="updatetypeoffre.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $typeoffre['idType']; ?> name="idType">
                </form>
            </td>
            <td>
                <a href="deletetypeoffre.php?id=<?php echo $typeoffre['idType']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>