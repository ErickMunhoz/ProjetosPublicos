<?php
require_once 'auth.php';
$page_title = 'Importar Banco de Dados - Byte_Burger';
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

        .warning-box {
            background: rgba(255, 0, 0, 0.1);
            border: 2px solid #ff0000;
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
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
        <h1 style="color: #0f0; margin-bottom: 2rem; text-align: center;">Importar Banco de Dados</h1>

        <div class="warning-box">
            <h3 style="color: #ff0000; margin-bottom: 0.5rem;">⚠️ ATENÇÃO</h3>
            <p style="color: #ff6666;">Esta ação irá <strong>SUBSTITUIR TODOS OS DADOS</strong> atuais do banco de dados. Faça um backup antes de continuar!</p>
        </div>

        <form action="processar_importacao.php" method="POST" enctype="multipart/form-data"
            onsubmit="return confirm('Tem certeza que deseja importar? Todos os dados atuais serão substituídos!');">

            <div class="form-group">
                <label>Arquivo SQL (.sql):</label>
                <input type="file" name="sql_file" accept=".sql" required
                    style="padding: 0.8rem; border: 1px solid #0f0; background: rgba(0,0,0,0.8); color: #fff;">
            </div>

            <div style="display: flex; gap: 1rem;">
                <a href="listar.php" class="btn btn-cancel" style="flex: 1;">Cancelar</a>
                <button type="submit" class="btn btn-primary" style="flex: 1;">Importar</button>
            </div>
        </form>
    </main>

    <?php include '../componentes/footer.php'; ?>