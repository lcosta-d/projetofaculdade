<?php
$servername = "localhost";
$username = "root";
$password = "estacio@estacio";
$dbname = "faculdade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT email, senha FROM USUARIOS WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedSenha = $row["senha"];

    if (password_verify($senha, $hashedSenha)) {
        echo "login_sucesso";
    } else {
        echo "login_falhou";
    }
} else {
    echo "login_falhou";
}

$conn->close();
?>
