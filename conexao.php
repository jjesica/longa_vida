<?php
$servername = "localhost";
$database = "longaa_vida"; // Nome do banco de dados
$username = "root";
$password = "";

// Conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificação da conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Configuração do charset para utf8
mysqli_set_charset($conn, "utf8");
?>
