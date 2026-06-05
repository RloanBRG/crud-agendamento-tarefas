<?php

include("../sistema/conexao.php");

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$status = $_POST['status'];

$sql = "INSERT INTO tarefas(titulo,descricao,data_tarefa,status)
        VALUES('$titulo', '$descricao', '$data', '$status')";
if ($conn->query($sql) === TRUE) {
    header("Location: ../sistema/dashboard.php?tab=tasks&status=task_cadastrada");
    exit;
    } else {
        header("Location: ../sistema/dashboard.php?status=erro");
        exit;
}

?>