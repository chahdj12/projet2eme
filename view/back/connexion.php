<?php
$servername='localhost';
$username='root';
$password='';
$dbname='crud';
try{
$pdo =new PDO(
    "mysql:host=$servername;dbname=$dbname",
    $username,
    $password,
   
);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
//echo"Connected successefully\n";
}
catch(PDOException $e){
echo "Connection failed:". $e->getMessage();
}