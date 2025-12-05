<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "thegame";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
