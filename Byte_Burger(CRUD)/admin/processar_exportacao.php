<?php
require_once 'auth.php';
require_once __DIR__ . '/../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['filename'])) {
    header('Location: exportar_db.php');
    exit;
}

// Sanitiza o nome do arquivo (remove caracteres não permitidos)
$filename = preg_replace('/[^a-zA-Z0-9_-]/', '', $_POST['filename']);
if (empty($filename)) {
    $filename = 'backup_byte_burger_' . date('Y-m-d_H-i-s');
}
$filename .= '.sql';

// Configurações do banco
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'thegame';

// Caminho completo para mysqldump (ajuste se necessário)
$mysqldump_path = 'C:\\xampp\\mysql\\bin\\mysqldump.exe';

// Comando para exportar
$command = "\"$mysqldump_path\" --user=$user --password=$password --host=$host $database > \"$filename\"";

// Executa o comando
exec($command, $output, $return_var);

if ($return_var === 0) {
    // Sucesso - faz download do arquivo
    if (file_exists($filename)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/sql');
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        readfile($filename);

        // Remove o arquivo temporário
        unlink($filename);
        exit;
    } else {
        echo "<script>alert('Erro: arquivo de backup não foi gerado.'); window.location.href='exportar_db.php';</script>";
    }
} else {
    echo "<script>alert('Erro ao exportar banco de dados. Verifique se o mysqldump está disponível.'); window.location.href='exportar_db.php';</script>";
}
