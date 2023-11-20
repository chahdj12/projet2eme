<?php
include "../Controller/offreC.php";

$c = new offreC();
$tab = $c->listoffre();

?>

<center>
    <h1>La liste des offres 2</h1>
    <h2>
        <a href="addoffre.php">AJOUT D'OFFRE</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>id d'offre</th>
        <th>Description d'offre</th>
        <th>Localisation d'offre</th>
        <th>Type d'offre </th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $offre) {
    ?>




        <tr>
            <td><?= $offre['idoffre']; ?></td>
            <td><?= $offre['descoffre']; ?></td>
            <td><?= $offre['localoffre']; ?></td>
            <td><?= $offre['typeoffre']; ?></td>
            
            <td align="center">
                <form method="POST" action="updateoffre.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $offre['idoffre']; ?> name="idoffre">
                </form>
            </td>
            <td>
                <a href="deleteoffre.php?id=<?php echo $offre['idoffre']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>