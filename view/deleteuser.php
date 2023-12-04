<?php
include '../controller/userC.php'; 

$userC = new userC();

if (isset($_GET["id"])) {
    $userId = $_GET["id"];
    $userC->deleteUser($userId);
    header('Location: listuser.php'); // Update the redirection path
    exit;
}
?>