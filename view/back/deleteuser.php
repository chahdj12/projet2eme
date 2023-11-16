<?php
include '../Controller/usercontroller.php';
$user = new usercontroller();
$user->deleteuser($_GET["id"]);
header('Location:listuser.php');
