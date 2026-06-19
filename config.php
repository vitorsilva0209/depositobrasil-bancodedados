<?php
$servername = "192.168.103.4";
$username = "vitor";
$password = "Vit@theus123";
$dbname = "projeto2bimestre";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}