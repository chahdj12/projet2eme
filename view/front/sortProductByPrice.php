<?php
include "../../controller/produitC.php";
$productC = new produitC();

if (isset($_POST['order'])) {
    $sortOrder = $_POST['order'];
    $sortedProducts = $productC->sortProductsByPrice($sortOrder);
    
    foreach ($sortedProducts as $row) {
        echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
        echo '<div class="tm-tours-box-1">';
        echo '<img src="img/tours-09.jpg" alt="image" class="img-responsive">';
        echo '<div class="tm-tours-box-1-info">';
        echo '<div class="tm-tours-box-1-info-left">';
        echo '<p class="text-uppercase margin-bottom-20">' . $row['name'] . '</p>';
        echo '</div>';
        echo '<div class="tm-tours-box-1-info-right">';
        echo '<p class="gray-text tours-1-description">' . $row['descriptionP'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="tm-tours-box-1-link">';
        echo '<div class="tm-tours-box-1-link-left">' . $row['prix'] . ' DT</div>';
        echo '<a href="./detailsProduct.php?id=' . $row['id_produit'] . '" class="tm-tours-box-1-link-right">Details</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>
