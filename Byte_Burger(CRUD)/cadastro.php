<?php
$page_title = 'Cadastro de Admin - Byte_Burger';
include 'componentes/header.php';
?>

<?php include 'componentes/nav.php'; ?>

<main style="padding-top: 60px;">
    <!-- ========== SEÇÃO HERO ========== -->
    <section style="
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1) 0%, rgba(0, 0, 0, 0.9) 100%);
        border-bottom: 2px solid #00ff00;
        padding: 3rem 1rem;
        text-align: center;
    ">
        <div class="container">
            <h1 style="margin-bottom: 1rem;">Novo Admin</h1>
            <p style="color: #888;">Crie uma conta para gerenciar o sistema</p>
        </div>
    </section>

    <!-- ========== FORMULÁRIO DE CADASTRO ========== -->
    <section style="padding: 3rem 1rem;">
        <div class="container" style="max-width: 400px;">
            <form method="POST" action="processar_cadastro.php" style="
                background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(10, 10, 10, 0.9) 100%);
                border: 2px solid #00cc00;
                padding: 2rem;
                border-radius: 0;
            ">
                <!-- Campo: Usuário -->
                <div class="form-group">
                    <label for="usuario">Usuário</label>
                    <input
                        type="text"
                        id="usuario"
                        name="usuario"
                        required
                        placeholder="Escolha um nome de usuário">
                </div>

                <!-- Campo: Senha -->
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        required
                        placeholder="Escolha uma senha forte">
                </div>

                <!-- Campo: Confirmar Senha -->
                <div class="form-group">
                    <label for="confirma_senha">Confirmar Senha</label>
                    <input
                        type="password"
                        id="confirma_senha"
                        name="confirma_senha"
                        required
                        placeholder="Repita a senha">
                </div>

                <!-- Botão de cadastro -->
                <button type="submit" class="btn" style="width: 100%;">
                    Cadastrar
                </button>

                <!-- Links -->
                <div style="text-align: center; margin-top: 1rem;">
                    <p style="color: #888; margin: 0.5rem 0;">
                        Já tem conta? <a href="login.php" style="color: #00ff00;">Faça login</a>
                    </p>
                </div>
            </form>
        </div>
    </section>
</main>

<?php include 'componentes/footer.php'; ?>