<?php
// ATENÇÃO: Sem autenticação - apenas para desenvolvimento!
require_once __DIR__ . '/../config/conexao.php';

$page_title = 'Editar Usuário - Byte_Burger';

if (!isset($_GET['id'])) {
    header('Location: listar_usuarios.php');
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM login WHERE idLogin = '$id'";
$query = mysqli_query($conn, $sql);
$usuario = mysqli_fetch_assoc($query);

if (!$usuario) {
    header('Location: listar_usuarios.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>

    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/components.css">

    <style>
        .admin-container {
            padding: 100px 20px 40px;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #0f0;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #0f0;
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: 1px solid transparent;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            color: #fff;
            background: transparent;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-align: center;
        }

        .btn:hover {
            border-bottom: 2px solid #0f0;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.3);
        }

        .btn-primary {
            color: #0f0;
            border: 1px solid #0f0;
        }

        .btn-primary:hover {
            background: rgba(0, 255, 0, 0.1);
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.4);
        }

        .btn-cancel {
            color: #fff;
        }

        .btn-cancel:hover {
            color: #888;
        }
    </style>
</head>

<body class="matrix-theme">

    <?php include '../componentes/nav.php'; ?>

    <main class="admin-container">
        <h1 style="color: #0f0; margin-bottom: 2rem; text-align: center;">Editar Usuário</h1>

        <form action="processar_usuario.php" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php echo $usuario['idLogin']; ?>">

            <div class="form-group">
                <label>Usuário:</label>
                <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario['usuario']); ?>" required>
            </div>

            <div class="form-group">
                <label>Nova Senha (deixe vazio para manter a atual):</label>
                <input type="password" name="senha" placeholder="Digite a nova senha">
            </div>

            <div style="display: flex; gap: 1rem;">
                <a href="listar_usuarios.php" class="btn btn-cancel" style="flex: 1;">Cancelar</a>
                <button type="submit" class="btn btn-primary" style="flex: 1;">Salvar Alterações</button>
            </div>
        </form>
    </main>

</body>

</html>