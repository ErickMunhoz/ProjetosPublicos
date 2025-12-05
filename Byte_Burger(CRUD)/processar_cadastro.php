<?php
require_once 'config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = $_POST['senha'];
    $confirma_senha = $_POST['confirma_senha'];

    // Validação básica
    if (empty($usuario) || empty($senha)) {
        echo "<script>alert('Preencha todos os campos!'); window.history.back();</script>";
        exit;
    }

    if ($senha !== $confirma_senha) {
        echo "<script>alert('As senhas não conferem!'); window.history.back();</script>";
        exit;
    }

    // Verifica se usuário já existe
    $check_sql = "SELECT * FROM login WHERE usuario = '$usuario'";
    $check_query = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('Este usuário já existe!'); window.history.back();</script>";
        exit;
    }

    // Hash da senha
    // NOTA: O projeto original usa texto plano. Vamos tentar usar hash para maior segurança no byte_burger.
    // Se precisar de compatibilidade com o sistema antigo, teremos que remover o password_hash.
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Insere no banco
    // A tabela é 'login' com colunas 'usuario' e 'senha' (baseado no Thegame)
    $sql = "INSERT INTO login (usuario, senha) VALUES ('$usuario', '$senha_hash')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Cadastro realizado com sucesso! Faça login.');
            window.location.href = 'login.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro ao cadastrar: " . mysqli_error($conn) . "');
            window.history.back();
        </script>";
    }
} else {
    header('Location: cadastro.php');
    exit;
}
