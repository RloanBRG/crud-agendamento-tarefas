<?php

include("conexao.php");

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$status = $_POST['status'];

$sql = "INSERT INTO usuarios(titulo,descricao,data,status)
        VALUES('$titulo', '$descricao', '$data', '$data', '$status')";
if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php?status=sucesso");
    exit;
    } else {
        header("Location: dashboard.php?status=erro");
        exit;
}

?>