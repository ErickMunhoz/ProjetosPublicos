<?php
session_start();

// Se já estiver logado, redireciona para admin
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    header('Location: admin/listar.php');
    exit;
}

require_once 'config/conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = $_POST['senha'];

    // Busca o usuário no banco
    $sql = "SELECT * FROM login WHERE usuario = '$usuario'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        $dados = mysqli_fetch_assoc($query);

        // Verifica a senha (suporta hash e texto plano para legado)
        // Primeiro tenta verificar hash
        if (password_verify($senha, $dados['senha'])) {
            $_SESSION['admin'] = true;
            $_SESSION['usuario'] = $usuario;
            header('Location: admin/listar.php');
            exit;
        }
        // Fallback para senhas antigas em texto plano (do projeto Thegame)
        elseif ($senha === $dados['senha']) {
            $_SESSION['admin'] = true;
            $_SESSION['usuario'] = $usuario;
            header('Location: admin/listar.php');
            exit;
        } else {
            $erro = 'Senha incorreta!';
        }
    } else {
        $erro = 'Usuário não encontrado!';
    }
}

$page_title = 'Login - Byte_Burger';
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
            <h1 style="margin-bottom: 1rem;">Login</h1>
            <p style="color: #888;">Acesse sua conta Byte_Burger</p>
        </div>
    </section>

    <!-- ========== FORMULÁRIO DE LOGIN ========== -->
    <section style="padding: 3rem 1rem;">
        <div class="container" style="max-width: 400px;">
            <form method="POST" action="" style="
                background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(10, 10, 10, 0.9) 100%);
                border: 2px solid #00cc00;
                padding: 2rem;
                border-radius: 0;
            ">
                <?php if ($erro): ?>
                    <div style="color: #ff0000; text-align: center; margin-bottom: 1rem; border: 1px solid #ff0000; padding: 0.5rem;">
                        <?php echo $erro; ?>
                    </div>
                <?php endif; ?>

                <!-- Campo: Usuário -->
                <div class="form-group">
                    <label for="usuario">Usuário</label>
                    <input
                        type="text"
                        id="usuario"
                        name="usuario"
                        required
                        placeholder="Nome de usuário">
                </div>

                <!-- Campo: Senha -->
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        required
                        placeholder="Sua senha">
                </div>

                <!-- Botão de login -->
                <button type="submit" class="btn" style="width: 100%;">
                    Entrar
                </button>

                <!-- Links -->
                <div style="text-align: center; margin-top: 1rem;">
                    <p style="color: #888; margin: 0.5rem 0;">
                        Não tem conta? <a href="cadastro.php"
                            style="color: #00ff00; transition: all 0.3s ease; display: inline-block;"
                            onmouseover="this.style.textShadow='0 0 20px rgba(0,255,0,0.8)'; this.style.transform='scale(1.05)'"
                            onmouseout="this.style.textShadow='none'; this.style.transform='scale(1)'">Cadastre-se aqui</a>
                    </p>
                    <p style="color: #888; margin: 0.5rem 0;">
                        <a href="admin/listar_usuarios.php"
                            style="color: #00ff00; transition: all 0.3s ease; display: inline-block;"
                            onmouseover="this.style.textShadow='0 0 20px rgba(0,255,0,0.8)'; this.style.transform='scale(1.05)'"
                            onmouseout="this.style.textShadow='none'; this.style.transform='scale(1)'">Esqueceu a senha?</a>
                    </p>
                </div>
            </form>
        </div>
    </section>
</main>

<footer>
    <div class="footer-content">
        <p>&copy; 2025 Byte_Burger. Todos os direitos reservados.</p>
        <p>Feito com código assim como a matrix.</p>
    </div>
</footer>

<?php include 'componentes/footer.php'; ?>