<?php
session_start();

// Verifica se o usuário está logado como admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: ../login.php');
    exit;
}
