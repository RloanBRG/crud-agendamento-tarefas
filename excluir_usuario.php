<?php
include ("conexao.php");
if (isset($_POST['id'])) {
    // Protege a variável convertendo para número inteiro
    $id = intval($_POST['id']);
    
    $sql = "DELETE FROM usuarios WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php?status=user_excluido");
        exit;
        } else {
        header("Location: dashboard.php?status=erro");
        exit;
    } 
}
?>