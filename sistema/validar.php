<?php
session_start();

include("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios 
        WHERE email='$email' 
        AND senha='$senha'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

    $usuario = $result->fetch_assoc();

    $_SESSION['usuario'] = $usuario['email'];
    $_SESSION['nome'] = $usuario['nome'];

    header("Location: dashboard.php");
    exit();
} else {
    echo "Email ou senha inválidos";
}
?>