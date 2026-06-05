<?php

include("../sistema/conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuarios(nome,email,senha)
        VALUES('$nome', '$email', '$senha')";
if ($conn->query($sql) === TRUE) {
    header("Location: ../sistema/dashboard.php?status=user_cadastrado");
    exit;
    } else {
        header("Location: ../sistema/dashboard.php?status=erro");
        exit;
}

?>