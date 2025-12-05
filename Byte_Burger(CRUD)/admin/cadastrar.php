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
        }

        #preview {
            max-width: 100%;
            max-height: 300px;
            display: none;
        }
    </style>
    </head>

    <body class="matrix-theme">

        <?php include '../componentes/nav.php'; ?>

        <main class="admin-container">
            <h1 style="color: #0f0; margin-bottom: 2rem; text-align: center;">Novo Produto</h1>

            <form action="processar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="acao" value="cadastrar">

                <div class="form-group">
                    <label>Nome do Produto:</label>
                    <input type="text" name="nome" required>
                </div>

                <div class="form-group">
                    <label>Preço (R$):</label>
                    <input type="number" step="0.01" name="preco" required>
                </div>

                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea name="descricao" required></textarea>
                </div>

                <div class="form-group">
                    <label>Imagem do Produto:</label>
                    <input type="file" accept="image/*" name="imagem" required
                        onchange="const preview = document.getElementById('preview'); preview.src = window.URL.createObjectURL(this.files[0]); preview.style.display = 'block';">

                    <div class="preview-container">
                        <img id="preview" alt="Preview da imagem">
                        <span style="color: #888;" id="preview-text">Preview da imagem</span>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <a href="listar.php" style="padding: 1rem; color: #fff; text-decoration: none;">Cancelar</a>
                    <button type="submit" class="btn-submit">Cadastrar Produto</button>
                </div>
            </form>
        </main>

        <script>
            document.getElementById('preview').onload = function() {
                document.getElementById('preview-text').style.display = 'none';
            }
        </script>

    </body>

    </html>