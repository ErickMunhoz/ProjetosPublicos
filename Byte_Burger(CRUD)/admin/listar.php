<?php
require_once 'auth.php';
require_once __DIR__ . '/../config/conexao.php';

$page_title = 'Gerenciar Produtos - Byte_Burger';

$pesquisaProduto = "";
if (isset($_GET['busca'])) {
    $pesquisaProduto = $_GET['busca'];
    $sql = "SELECT * FROM produto WHERE nomeProduto LIKE '%$pesquisaProduto%' ORDER BY idProduto";
} else {
    $sql = "SELECT * FROM produto ORDER BY idProduto";
}

$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>

    <!-- Estilos CSS com versionamento para evitar cache -->
    <link rel="stylesheet" href="../assets/css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/components.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/animations.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/responsive.css?v=<?php echo time(); ?>">

    <style>
        .admin-container {
            padding: 100px 20px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .search-box {
            display: flex;
            gap: 0.5rem;
        }

        .search-box input {
            padding: 0.5rem;
            border: 1px solid #0f0;
            background: #000;
            color: #0f0;
        }

        /* Estilos dos botões - tema navbar */
        .btn-admin {
            padding: 0.5rem 1rem;
            border: 1px solid transparent;
            border-bottom: 2px solid transparent;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            color: #fff;
            background: transparent;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .btn-admin:hover {
            border-bottom-color: #0f0;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.3);
        }

        .btn-primary {
            color: #fff;
        }

        .btn-primary:hover {
            color: #0f0;
        }

        .btn-edit {
            color: #fff;
        }

        .btn-edit:hover {
            color: #0f0;
            border-bottom-color: #0f0;
        }

        .btn-delete {
            color: #fff;
        }

        .btn-delete:hover {
            color: #ff0000;
            border-bottom: 2px solid #ff0000;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.3);
        }

        /* CORREÇÃO: Botões de exportar/importar com borda completa */
        .btn-export,
        .btn-import {
            color: #0f0;
            border: 1px solid #0f0;
            /* Removido border-bottom: transparent que causava o corte */
        }

        .btn-export:hover,
        .btn-import:hover {
            background: rgba(0, 255, 0, 0.1);
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.4);
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

        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .admin-header {
                flex-direction: column;
                align-items: stretch;
            }

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 1rem;
                border: 1px solid #0f0;
                padding: 1rem;
            }

            td {
                padding: 0.5rem 0;
                border: none;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                color: #0f0;
                margin-right: 1rem;
            }
        }
    </style>
</head>

<body class="matrix-theme">

    <?php include '../componentes/nav.php'; ?>

    <main class="admin-container">
        <div class="admin-header">
            <h1 style="color: #0f0;">Gerenciar Produtos</h1>

            <div class="search-box">
                <form method="GET" action="" style="display: flex; gap: 0.5rem;">
                    <input type="text" name="busca" placeholder="Pesquisar..." value="<?php echo htmlspecialchars($pesquisaProduto); ?>">
                    <button type="submit" class="btn-admin btn-primary">Buscar</button>
                </form>
                <a href="cadastrar.php" class="btn-admin btn-primary">Novo Produto</a>
            </div>
        </div>

        <!-- Botões de Backup do Banco de Dados -->
        <div style="margin-bottom: 2rem; display: flex; gap: 1rem; justify-content: flex-end;">
            <a href="exportar_db.php" class="btn-admin btn-export">
                Exportar Banco de Dados
            </a>
            <a href="importar_db.php" class="btn-admin btn-import">
                Importar Banco de Dados
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dados = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td data-label="ID"><?php echo $dados['idProduto']; ?></td>
                        <td data-label="Imagem">
                            <?php if (!empty($dados['imagemProduto'])): ?>
                                <img src="../../Thegame/images/<?php echo $dados['imagemProduto']; ?>" alt="Produto" class="product-img">
                            <?php else: ?>
                                <span>Sem imagem</span>
                            <?php endif; ?>
                        </td>
                        <td data-label="Nome"><?php echo htmlspecialchars($dados['nomeProduto']); ?></td>
                        <td data-label="Preço">R$ <?php echo number_format($dados['precoProduto'], 2, ',', '.'); ?></td>
                        <td data-label="Ações">
                            <a href="editar.php?id=<?php echo $dados['idProduto']; ?>" class="btn-admin btn-edit">Editar</a>
                            <a href="processar.php?acao=excluir&id=<?php echo $dados['idProduto']; ?>"
                                class="btn-admin btn-delete"
                                onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

    <?php include '../componentes/footer.php'; ?>