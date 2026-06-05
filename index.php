<?php

// so para facilitar o acesso do usuario pela pasta

session_start();
require_once 'sistema/conexao.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: sistema/login.php");
    exit();
}else{
    header("Location: sistema/dashboard.php");
}

?>