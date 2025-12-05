<?php
// ATENÇÃO: Esta página NÃO requer autenticação por ser uma página de recuperação
// Use apenas em ambiente de desenvolvimento!
require_once __DIR__ . '/../config/conexao.php';

$page_title = 'Recuperação de Senha - Byte_Burger';

$sql = "SELECT * FROM login ORDER BY idLogin";
$query = mysqli_query($conn, $sql);
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
            max-width: 1000px;
            margin: 0 auto;
        }

        .warning-box {
            background: rgba(255, 165, 0, 0.1);
            border: 2px solid #ffa500;
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            background: rgba(0, 20, 0, 0.8);
            border: 1px solid #0f0;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #0f0;
            color: #fff;
        }

        th {
            background: rgba(0, 255, 0, 0.2);
            color: #0f0;
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
        }

        .btn-edit {
            color: #fff;
        }

        .btn-edit:hover {
            color: #0f0;
            border-bottom: 2px solid #0f0;
        }

        .btn-delete {
            color: #fff;
        }

        .btn-delete:hover {
            color: #ff0000;
            border-bottom: 2px solid #ff0000;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.3);
        }
    </style>
</head>

<body class="matrix-theme">

    <?php include '../componentes/nav.php'; ?>

    <main class="admin-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <h1 style="color: #0f0; margin: 0;">Recuperação de Senha</h1>
            <a href="../cadastro.php" class="btn btn-primary">Novo Usuário</a>
        </div>

        <div class="warning-box">
            <h3 style="color: #ffa500; margin-bottom: 0.5rem;">⚠️ ATENÇÃO - Ambiente de Desenvolvimento</h3>
            <p style="color: #ffcc80;">Esta página NÃO requer autenticação por ser uma página de recuperação. Mostra todos os usuários cadastrados. Use essas credenciais para fazer login ou gerencie os usuários. Isso é apenas para desenvolvimento. Quando for para produção, precisará mover essas páginas para uma área protegida com autenticação adequada!</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Tipo de Senha</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dados = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?php echo $dados['idLogin']; ?></td>
                        <td><?php echo htmlspecialchars($dados['usuario']); ?></td>
                        <td>
                            <?php
                            // Detecta se é hash ou texto plano
                            if (strlen($dados['senha']) == 60 && strpos($dados['senha'], '$2y$') === 0) {
                                echo '<span style="color: #0f0;">Criptografada (Segura)</span>';
                            } else {
                                echo '<span style="color: #ffa500;">Texto Plano: ' . htmlspecialchars($dados['senha']) . '</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="editar_usuario.php?id=<?php echo $dados['idLogin']; ?>" class="btn btn-edit">Editar</a>
                            <a href="processar_usuario.php?acao=excluir&id=<?php echo $dados['idLogin']; ?>"
                                class="btn btn-delete"
                                onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div style="text-align: center; margin-top: 2rem;">
            <a href="../login.php" class="btn btn-primary">Voltar ao Login</a>
        </div>
    </main>

    <?php include '../componentes/footer.php'; ?>