<?php
$servername = "localhost";  // Endereço do servidor MySQL (geralmente 'localhost')
$username = "root";  // Nome de usuário do MySQL
$password = "";    // Senha do MySQL
$dbname = "biomedicina";    // Nome do banco de dados que você está usando

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
