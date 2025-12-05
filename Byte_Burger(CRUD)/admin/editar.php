<?php
require_once 'auth.php';
require_once __DIR__ . '/../config/conexao.php';

$page_title = 'Editar Produto - Byte_Burger';

if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM produto WHERE idProduto = '$id'";
$query = mysqli_query($conn, $sql);
$produto = mysqli_fetch_assoc($query);

if (!$produto) {
    header('Location: listar.php');
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
    <link rel="stylesheet" href="../assets/css/animations.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">

    <style>
        .admin-container {
            padding: 100px 20px 40px;
            max-width: 800px;
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
        input[type="number"],
        textarea {
            width: 100%;
            padding: 0.8rem;
            border-radius: 4px;
            border: 1px solid #0f0;
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            font-family: inherit;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .btn-submit {
            background: #0f0;
            color: #000;
            padding: 1rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            font-size: 1.1rem;
        }

        .btn-submit:hover {
            box-shadow: 0 0 15px #0f0;
        }

        .preview-container {
            margin-top: 1rem;
            text-align: center;
            border: 1px dashed #0f0;
            padding: 1rem;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .img-preview {
            max-width: 100%;
            max-height: 300px;
            margin: 10px 0;
        }
    </style>
</head>

<body class="matrix-theme">

    <?php include '../componentes/nav.php'; ?>

    <main class="admin-container">
        <h1 style="color: #0f0; margin-bottom: 2rem; text-align: center;">Editar Produto</h1>

        <form action="processar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php echo $produto['idProduto']; ?>">

            <div class="form-group">
                <label>Nome do Produto:</label>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nomeProduto']); ?>" required>
            </div>

            <div class="form-group">
                <label>Preço (R$):</label>
                <input type="number" step="0.01" name="preco" value="<?php echo $produto['precoProduto']; ?>" required>
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="descricao" required><?php echo htmlspecialchars($produto['fichaTecnica']); ?></textarea>
            </div>

            <div class="form-group">
                <label>Imagem do Produto (deixe vazio para manter a atual):</label>
                <input type="file" accept="image/*" name="imagem"
                    onchange="const preview = document.getElementById('preview-new'); preview.src = window.URL.createObjectURL(this.files[0]); preview.style.display = 'block';">

                <div class="preview-container">
                    <div style="margin-bottom: 1rem;">
                        <p style="color: #888;">Imagem Atual:</p>
                        <?php if (!empty($produto['imagemProduto'])): ?>
                            <img src="../../Thegame/images/<?php echo $produto['imagemProduto']; ?>" class="img-preview">
                        <?php else: ?>
                            <p>Sem imagem</p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <p style="color: #888;">Nova Imagem:</p>
                        <img id="preview-new" class="img-preview" style="display: none;">
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 1rem;">
                <a href="listar.php" style="padding: 1rem; color: #fff; text-decoration: none;">Cancelar</a>
                <button type="submit" class="btn-submit">Salvar Alterações</button>
            </div>
        </form>
    </main>

</body>

</html>