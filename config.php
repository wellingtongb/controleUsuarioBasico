<?php
$dsn = "mysql:dbname=bancodadosteste;host=localhost";
$dbUser = "root";
$dbPassword = "qwert1234";

try{
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
}catch(PDOException $e){
    echo "Falhou a conexao: ".$e->getMessage();
}