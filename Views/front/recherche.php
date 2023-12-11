<?php
require_once("../../Controller/OffreC.php");

$offreC = new OffreC();
$search = isset($_POST['search']) ? $_POST['search'] : "";
$offres = $offreC->afficherOffresRecherche($search);

foreach ($offres as $offre) {
    // Votre code d'affichage ici
    $isLiked = $offreC->isLiked(1, $offre['id']);
    $likeText = $isLiked ? "Liked" : "Like";

    echo "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
            <div class='tm-tours-box-1'>
                <img src='{$offre['logo']}' alt='image' class='img-responsive'>
                <div class='tm-tours-box-1-info'>
                    <div class='tm-tours-box-1-info-left'>
                        <p class='text-uppercase margin-bottom-20'>{$offre['nom']}</p>    
                        <p class='gray-text'>{$offre['date_debut']}</p>
                    </div>
                    <div class='tm-tours-box-1-info-right'>
                        <p class='gray-text tours-1-description'>{$offre['description']}.</p>    
                    </div>                            
                </div>
                <div class='tm-tours-box-1-link'>
                    <div class='tm-tours-box-1-link-left'>
                        {$offre['localisation']}
                    </div>
                    
                    <a href='#' class='tm-tours-box-1-link-right like-btn' data-offre='{$offre['id']}'>{$likeText}</a>
                    <span class='like-count'>{$offreC->getLikeCount($offre['id'])}</span> Likes
                    <a href='ajouterReservation.php?id='{$offre['id']}' class='tm-tours-box-1-link-left reserve-btn'>Reserve</a>
                </div>
            </div>                    
        </div>";
}

?>
