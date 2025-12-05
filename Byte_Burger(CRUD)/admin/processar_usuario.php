<?php
// ATENÇÃO: Sem autenticação - apenas para desenvolvimento!
require_once __DIR__ . '/../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_POST['acao'];

    if ($acao == 'editar') {
        $id = $_POST['id'];
        $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
        $senha = $_POST['senha'];

        // Atualiza usuário
        if (!empty($senha)) {
            // Se forneceu nova senha, criptografa
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "UPDATE login SET usuario='$usuario', senha='$senha_hash' WHERE idLogin='$id'";
        } else {
            // Se não forneceu senha, mantém a atual
            $sql = "UPDATE login SET usuario='$usuario' WHERE idLogin='$id'";
        }

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                alert('Usuário atualizado com sucesso!');
                window.location.href = 'listar_usuarios.php';
            </script>";
        } else {
            echo "<script>
                alert('Erro ao atualizar: " . mysqli_error($conn) . "');
                window.history.back();
            </script>";
        }
    }
} elseif (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    $id = $_GET['id'];

    $sql = "DELETE FROM login WHERE idLogin='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Usuário excluído com sucesso!');
            window.location.href = 'listar_usuarios.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro ao excluir: " . mysqli_error($conn) . "');
            window.location.href = 'listar_usuarios.php';
        </script>";
    }
}
