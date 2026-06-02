<?php
include ("conexao.php");

if($_POST['acao'] == 'editar_task') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_tarefa = $_POST['data_tarefa'];
    $status = $_POST['status'];

        //se descricao nova
        if (!empty($descricao)){
            $sql = "UPDATE tarefas
            SET titulo = '$titulo',
                descricao = '$descricao',
                data_tarefa = '$data_tarefa',
                status = '$status'
            WHERE id = '$id'";
        } else {
            $sql = "UPDATE tarefas SET
                titulo = '$titulo',
                data_tarefa = '$data_tarefa'
                status = '$status'
            WHERE id='$id'";
        }

        if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php?tab=tasks&status=task_editada");
        exit;
        } else {
            header("Location: dashboard.php?status=erro");
            exit;
    } 
}
?>