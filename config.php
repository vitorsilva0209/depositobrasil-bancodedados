<?php
$servername = "192.168.103.4";
$username = "vitor";
$password = "Vit@theus123";
$dbname = "projeto2bimestre";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    //die("Falha na conexão: " . $conn->connect_error);
}

echo "<p>Conectado com sucesso ao banco externo!</p>";


$sql = "SELECT * FROM produtos";

$resultado = $conn->query($sql);


if ($resultado->num_rows > 0) {

    while ($linha = $resultado->fetch_assoc()) {

        echo "<p>";
        echo $linha["nome"] . " - R$ " . $linha["preco"];
        echo "</p>";

    }

} else {

    echo "Nenhum produto encontrado.";

}

$conn->close();

include("config.php");

echo "Conexão realizada com sucesso!<br>";

$sql = "SELECT * FROM produtos";
$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
   while ($linha = $resultado->fetch_assoc()) {
        echo $linha["nome"] . "<br>";
    }
} else {
    //echo "Nenhum produto encontrado.";
}

?>
