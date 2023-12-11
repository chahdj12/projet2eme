<?php
require_once("../../Controller/OffreC.php");

$offreC = new OffreC();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $offreId = $_POST['offreId'];
    $isLiked = $_POST['isLiked'];

    
    $userId = 1;
    

    if ($isLiked=="false") {
        $offreC->likeOffre($userId, $offreId);
    } else {
        $offreC->dislikeOffre($userId, $offreId);
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
