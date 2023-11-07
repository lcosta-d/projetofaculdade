<?php
$servername = "localhost";
$username = "root";
$password = "estacio@estacio";
$dbname = "faculdade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

$sql = "INSERT INTO usuarios (nome, sobrenome, idade, email, senha) VALUES ('$nome', '$sobrenome', '$idade', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "Conta criada com sucesso.";
} else {
    echo "Erro ao criar a conta: " . $conn->error;
}

$conn->close();
?>
