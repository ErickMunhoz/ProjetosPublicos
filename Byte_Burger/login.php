<?php
/**
 * BYTE_BURGER - LOGIN.PHP
 * =======================
 * Página de login com estilo Hacker Terminal
 * Inspirado em: https://codepen.io/codelyds/pen/dPGXXZW
 */

$page_title = 'Login - Byte_Burger';
include 'componentes/header.php';
?>

<!-- Canvas para Matrix Rain -->
<canvas id="matrix-canvas"></canvas>

<!-- Navbar -->
<?php include 'componentes/nav.php'; ?>

<!-- Terminal Wrapper (Centralizado) -->
<main class="terminal-wrap" role="main">
    <div class="terminal">
        <!-- Terminal Header -->
        <div class="term-header">
            <div class="dots">
                <span class="dot red"></span>
                <span class="dot yellow"></span>
                <span class="dot green"></span>
            </div>
            <div class="term-title">BYTE_BURGER AUTH</div>
        </div>
        
        <!-- Terminal Body -->
        <div class="term-body">
            <!-- Terminal Log (efeito de digitação) -->
            <div class="term-log">booting security modules...</div>
            
            <!-- Login Form -->
            <form id="loginForm" class="login-form" method="POST" action="#" novalidate>
                <!-- Campo: Username/Email -->
                <div class="form-field">
                    <label class="field-label" for="username">username</label>
                    <div class="input-wrap">
                        <input 
                            type="email" 
                            id="username" 
                            name="username" 
                            required
                            placeholder="admin@byte_burger.com"
                            autocomplete="off"
                        >
                    </div>
                </div>
                
                <!-- Campo: Password -->
                <div class="form-field">
                    <label class="field-label" for="password">passcode</label>
                    <div class="input-wrap">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            placeholder="••••••••"
                            autocomplete="off"
                        >
                    </div>
                </div>
                
                <!-- Botões -->
                <div class="form-buttons">
                    <button type="submit" class="btn-terminal">
                        ENTER
                    </button>
                    <button type="reset" class="btn-terminal btn-secondary">
                        CLEAR
                    </button>
                </div>
                
                <!-- Links -->
                <div class="form-footer">
                    <p>Não tem conta? <a href="#">Cadastre-se aqui</a></p>
                    <p><a href="#">Esqueceu a senha?</a></p>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include 'componentes/footer.php'; ?>
