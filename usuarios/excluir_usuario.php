<?php

include("../sistema/conexao.php");

if (isset($_POST['id'])) {
    // Protege a variável convertendo para número inteiro
    $id = intval($_POST['id']);
    
    $sql = "DELETE FROM usuarios WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
        header("Location: ../sistema/dashboard.php?status=user_excluido");
        exit;
        } else {
        header("Location: ../sistema/dashboard.php?status=erro");
        exit;
    } 
}
?>