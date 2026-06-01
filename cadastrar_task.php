<?php

include("conexao.php");

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$status = $_POST['status'];

$sql = "INSERT INTO tarefas(titulo,descricao,data_tarefa,status)
        VALUES('$titulo', '$descricao', '$data', '$status')";
if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php?status=sucesso_tarefa");
    exit;
    } else {
        header("Location: dashboard.php?status=erro");
        exit;
}

?>