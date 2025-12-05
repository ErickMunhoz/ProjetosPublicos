<?php
require_once 'auth.php';
require_once __DIR__ . '/../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['sql_file'])) {
    $file = $_FILES['sql_file'];

    // Verifica se o upload foi bem-sucedido
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('Erro no upload do arquivo.'); window.location.href='importar_db.php';</script>";
        exit;
    }

    // Verifica a extensão
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    if (strtolower($extension) !== 'sql') {
        echo "<script>alert('Apenas arquivos .sql são permitidos.'); window.location.href='importar_db.php';</script>";
        exit;
    }

    // Lê o conteúdo do arquivo SQL
    $sql_content = file_get_contents($file['tmp_name']);

    if (empty($sql_content)) {
        echo "<script>alert('Arquivo SQL vazio.'); window.location.href='importar_db.php';</script>";
        exit;
    }

    // Desabilita verificação de chaves estrangeiras temporariamente
    mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS=0');

    // Divide o SQL em comandos individuais
    $queries = explode(';', $sql_content);

    $success = true;
    $error_message = '';

    // Executa cada comando
    foreach ($queries as $query) {
        $query = trim($query);
        if (!empty($query)) {
            if (!mysqli_query($conn, $query)) {
                $success = false;
                $error_message = mysqli_error($conn);
                break;
            }
        }
    }

    // Reabilita verificação de chaves estrangeiras
    mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS=1');

    if ($success) {
        echo "<script>
            alert('Banco de dados importado com sucesso!');
            window.location.href='listar.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro ao importar banco de dados: " . addslashes($error_message) . "');
            window.location.href='importar_db.php';
        </script>";
    }
} else {
    header('Location: importar_db.php');
    exit;
}
