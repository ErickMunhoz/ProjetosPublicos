<?php
require_once 'auth.php';
$page_title = 'Exportar Banco de Dados - Byte_Burger';

// Nome padrão sugerido
$default_filename = 'backup_byte_burger_' . date('Y-m-d_H-i-s');
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

        .info-box {
            background: rgba(0, 255, 0, 0.1);
            border: 2px solid #00ff00;
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

        input[type="text"] {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #0f0;
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            font-family: 'Courier New', monospace;
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
        <h1 style="color: #0f0; margin-bottom: 2rem; text-align: center;">Exportar Banco de Dados</h1>

        <div class="info-box">
            <h3 style="color: #0f0; margin-bottom: 0.5rem;">ℹ️ Informação</h3>
            <p style="color: #888;">Esta operação irá criar um backup completo do banco de dados em formato SQL.</p>
        </div>

        <form action="processar_exportacao.php" method="POST">
            <div class="form-group">
                <label>Nome do arquivo (sem extensão):</label>
                <input type="text" name="filename" value="<?php echo $default_filename; ?>" required
                    pattern="[a-zA-Z0-9_-]+"
                    title="Use apenas letras, números, hífens e underscores">
                <small style="color: #888; display: block; margin-top: 0.5rem;">
                    O arquivo será salvo como: <strong id="preview"><?php echo $default_filename; ?>.sql</strong>
                </small>
            </div>

            <div style="display: flex; gap: 1rem;">
                <a href="listar.php" class="btn btn-cancel" style="flex: 1;">Cancelar</a>
                <button type="submit" class="btn btn-primary" style="flex: 1;">Exportar</button>
            </div>
        </form>
    </main>

    <script>
        // Atualiza o preview quando o usuário digita
        document.querySelector('input[name="filename"]').addEventListener('input', function() {
            document.getElementById('preview').textContent = this.value + '.sql';
        });
    </script>

    <?php include '../componentes/footer.php'; ?>