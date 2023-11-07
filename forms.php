<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agradecemos seu contato</title>
    <link rel="shortcut icon" href="images/loja.ico">
    <link rel="stylesheet" href="css/agradecimento.css">
</head>
<body>
    <img src="images/logo.png" alt="logo" style="vertical-align: middle;">
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "estacio@estacio";
$dbname = "faculdade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cidade = $_POST["cidade"];
    $mensagem = $_POST["mensagem"];

    $sql = "INSERT INTO formulario (nome, email, telefone, cidade, mensagem) VALUES ('$nome', '$email', '$telefone', '$cidade', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>A Healer agradece seu contato, $nome!</h1>";
        echo "<p>Caro cliente HEALER, recebemos sua mensagem, iremos analisar e em breve entraremos em contato.</p>";
    } else {
        echo "<h1>Algum erro aconteceu, preencha e envie novamente.</h1>";
    }
}

$conn->close();
?>