<?php

/**
 * BYTE_BURGER - INDEX.PHP
 * =======================
 * Página inicial com glitch background e animações
 */

$page_title = 'Home - Byte_Burger';
include 'componentes/header.php';
?>

<!-- ========== MATRIX BACKGROUND ========== -->
<style>
    #matrix {
        font-family: monospace;
        color: green;
        background-color: black;
        overflow: hidden;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        letter-spacing: 10px;
        pointer-events: none;
    }

    /* Ensure body matches theme */
    body {
        background-color: black;
    }
</style>

<div id="matrix">
    <p>
        loading...
    </p>
</div>

<script>
    const matrix = document.getElementById('matrix');

    // Generate random text
    const randomChar = () => {
        const chars = '01';
        return chars[Math.floor(Math.random() * chars.length)];
    };

    const randomLine = () => {
        const length = Math.floor(Math.random() * 800) + 20;
        let line = '';
        for (let i = 0; i < length; i++) {
            line += randomChar();
        }
        return line;
    };

    const generateText = () => {
        const lines = [];
        // Calculate lines needed to fill screen (assuming ~20px per line) + buffer
        const lineCount = Math.ceil(window.innerHeight / 20) + 5;
        for (let i = 0; i < lineCount; i++) {
            lines.push(randomLine());
        }
        return lines.join('<br>');
    };

    // Scroll text
    const scrollText = () => {
        matrix.innerHTML = generateText();
        requestAnimationFrame(scrollText);
    };

    scrollText();
</script>

<?php include 'componentes/nav.php'; ?>

<main style="padding-top: 60px; position: relative; z-index: 5;">

    <!-- ========== SEÇÃO HERO COM GLITCH ========== -->
    <section style="
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.05) 0%, rgba(0, 0, 0, 0.95) 100%);
        border-bottom: 2px solid #00ff00;
        padding: 4rem 1rem;
        text-align: center;
        position: relative;
    ">
        <div class="container">
            <h1 class="decrypted-text" style="margin-bottom: 1rem; font-size: 3rem;">
                Byte_Burger
            </h1>

            <p style="color: #888; font-size: 1.2rem; margin: 1rem 0;">
                A lanchonete do futuro, onde código e sabor se encontram.
            </p>

            <button class="btn" onclick="document.querySelector('#cardapio').scrollIntoView({behavior: 'smooth'})" style="margin-top: 2rem;">
                Ver Cardápio
            </button>
        </div>
    </section>

    <!-- ========== SEÇÃO DE DESTAQUE ========== -->
    <section id="cardapio" style="padding: 3rem 1rem;">
        <div class="container">
            <h2 class="decrypted-text" style="text-align: center; margin-bottom: 2rem;">
                Destaques
            </h2>

            <?php include 'componentes/carousel.php'; ?>
        </div>
    </section>

    <!-- ========== SEÇÃO DE CARDS COM SPOTLIGHT ========== -->
    <section style="padding: 3rem 1rem; background: rgba(0, 0, 0, 0.5);">
        <div class="container">
            <h2 class="decrypted-text" style="text-align: center; margin-bottom: 2rem;">
                Populares
            </h2>

            <div style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
            ">
                <!-- Card 1 -->
                <div class="spotlight-card stagger-item fade-content">
                    <div class="spotlight-card-content">
                        <div style="
                            width: 100%;
                            height: 120px;
                            background: linear-gradient(135deg, #00ff00, #00cc00);
                            margin-bottom: 1rem;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-weight: bold;
                            color: #000;
                        ">
                            X-Burger
                        </div>
                        <h3 class="spotlight-card-title">X-Burger Clássico</h3>
                        <p class="spotlight-card-description">
                            Hamburger com carne, alface, tomate e molho especial
                        </p>
                        <div class="spotlight-card-price">R$ 22,00</div>
                        <button class="spotlight-card-btn">Adicionar</button>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="spotlight-card stagger-item fade-content">
                    <div class="spotlight-card-content">
                        <div style="
                            width: 100%;
                            height: 120px;
                            background: linear-gradient(135deg, #00ff00, #00cc00);
                            margin-bottom: 1rem;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-weight: bold;
                            color: #000;
                        ">
                            X-Bacon
                        </div>
                        <h3 class="spotlight-card-title">X-Bacon Premium</h3>
                        <p class="spotlight-card-description">
                            Hamburger com bacon crocante, cheddar e molho barbecue
                        </p>
                        <div class="spotlight-card-price">R$ 25,00</div>
                        <button class="spotlight-card-btn">Adicionar</button>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="spotlight-card stagger-item fade-content">
                    <div class="spotlight-card-content">
                        <div style="
                            width: 100%;
                            height: 120px;
                            background: linear-gradient(135deg, #00ff00, #00cc00);
                            margin-bottom: 1rem;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-weight: bold;
                            color: #000;
                        ">
                            Mega Byte
                        </div>
                        <h3 class="spotlight-card-title">Mega Byte</h3>
                        <p class="spotlight-card-description">
                            Hamburger duplo com todos os complementos
                        </p>
                        <div class="spotlight-card-price">R$ 30,00</div>
                        <button class="spotlight-card-btn">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== SEÇÃO FINAL ========== -->
    <section style="
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1) 0%, rgba(0, 0, 0, 0.9) 100%);
        padding: 3rem 1rem;
        text-align: center;
        border-top: 2px solid #00ff00;
    ">
        <div class="container">
            <h2 class="decrypted-text" style="margin-bottom: 1rem;">
                Pronto?
            </h2>
            <p style="color: #888; margin-bottom: 2rem;">
                Faça seu pedido agora e aproveite os melhores lanches!
            </p>
            <a href="cardapio.php" class="btn">Ver Cardápio Completo</a>
        </div>
    </section>
</main>

<footer>
    <div class="footer-content">
        <p>&copy; 2025 Byte_Burger. Todos os direitos reservados.</p>
        <p>Feito com 💚 e código.</p>
    </div>
</footer>

<?php include 'componentes/footer.php'; ?>