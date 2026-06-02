<?php
include ("conexao.php");

if(isset($_POST['acao']) && $_POST['acao'] == 'editar_user') {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

        //se senha nova
        if (!empty($senha)){
            $sql = "UPDATE usuarios
            SET nome = '$nome',
                email = '$email',
                senha = '$senha'
            WHERE id = '$id'";
        } else {
            $sql = "UPDATE usuarios SET
                nome = '$nome',
                email = '$email'
            WHERE id='$id'";
        }

        if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php?status=user_editado");
        exit;
        } else {
            header("Location: dashboard.php?status=erro");
            exit;
    } 
}
?>