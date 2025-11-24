<?php

/**
 * BYTE_BURGER - CARDAPIO.PHP
 * ==========================
 * Página de cardápio com todos os produtos
 */

$page_title = 'Cardápio - Byte_Burger';
include 'componentes/header.php';
?>

<!-- ========== MATRIX BACKGROUND ========== -->
<style>
    body {
        background-color: black;
        /* overflow: hidden; - REMOVED to allow scrolling */
        margin: 0;
    }

    .matrix-container {
        position: fixed;
        /* Changed from absolute to fixed */
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: -1;
        /* Behind content */
        pointer-events: none;
        /* Allow clicking through */
    }

    #matrix {
        width: 100%;
        height: 100%;
    }
</style>

<div class="matrix-container">
    <canvas id="matrix" class="matrix-code"></canvas>
</div>

<script>
    function matrixEffect() {
        const canvas = document.getElementById('matrix');
        const ctx = canvas.getContext('2d');

        // Set canvas to full screen
        const resizeCanvas = () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        };
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        const fontSize = 16;
        let columns = Math.ceil(canvas.width / fontSize);
        let rows = Math.ceil(canvas.height / fontSize);
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let charMatrix = [];
        let opacityMatrix = [];

        const initMatrix = () => {
            columns = Math.ceil(canvas.width / fontSize);
            rows = Math.ceil(canvas.height / fontSize);
            charMatrix = Array.from({
                length: columns
            }, () => Array(rows).fill(''));
            opacityMatrix = Array.from({
                length: columns
            }, () => Array(rows).fill(1));

            // Generate matrix characters
            for (let col = 0; col < columns; col++) {
                for (let row = 0; row < rows; row++) {
                    charMatrix[col][row] = chars.charAt(Math.floor(Math.random() * chars.length));
                }
            }
        };

        initMatrix();
        window.addEventListener('resize', initMatrix);

        function draw() {
            // Use a slight fade effect for trails if desired, or clear completely
            // ctx.fillStyle = 'rgba(0, 0, 0, 0.05)';
            // ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            ctx.font = `${fontSize}px monospace`;

            for (let col = 0; col < columns; col++) {
                for (let row = 0; row < rows; row++) {
                    // Ensure we don't access out of bounds if resizing happened
                    if (!opacityMatrix[col] || !charMatrix[col]) continue;

                    ctx.fillStyle = `rgba(0, 255, 0, ${opacityMatrix[col][row]})`; // Changed to Green for Matrix theme
                    const text = charMatrix[col][row];
                    ctx.fillText(text, col * fontSize, row * fontSize + fontSize);
                }
            }
        }

        function glitchEffect() {
            for (let col = 0; col < columns; col++) {
                for (let row = 0; row < rows; row++) {
                    if (!opacityMatrix[col] || !charMatrix[col]) continue;

                    if (Math.random() > 0.98) {
                        charMatrix[col][row] = chars.charAt(Math.floor(Math.random() * chars.length));
                        opacityMatrix[col][row] = 0.1 + Math.random() * 0.9;
                    } else {
                        opacityMatrix[col][row] *= 0.95;
                        if (opacityMatrix[col][row] < 0.1) {
                            opacityMatrix[col][row] = 0.1;
                        }
                    }
                }
            }
            draw();
        }

        setInterval(glitchEffect, 100);
    }

    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', matrixEffect);
</script>

<?php
// Array de produtos
$produtos = [
    [
        'nome' => 'Byte_Classic',
        'descricao' => 'Hamburger clássico com carne, alface, tomate e molho especial',
        'preco' => 22.00
    ],
    [
        'nome' => 'Bit_Bacon',
        'descricao' => 'Hamburger com bacon crocante, cheddar e molho barbecue',
        'preco' => 25.00
    ],
    [
        'nome' => 'Mega_Byte',
        'descricao' => 'Hamburger duplo com todos os complementos. O maior da lanchonete!',
        'preco' => 30.00
    ],
    [
        'nome' => 'Cache_Fries',
        'descricao' => 'Batata frita crocante com tempero especial Matrix',
        'preco' => 12.00
    ],
    [
        'nome' => 'Data_Drink',
        'descricao' => 'Refrigerante gelado com sabor de código compilado',
        'preco' => 8.00
    ],
    [
        'nome' => 'Loop_Shake',
        'descricao' => 'Milkshake infinito de chocolate com cobertura de bits',
        'preco' => 15.00
    ]
];
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
            <h1 style="margin-bottom: 1rem;">Nosso Cardápio</h1>
            <p style="color: #888;">Escolha seus lanches favoritos e aproveite!</p>
        </div>
    </section>

    <!-- ========== GRID DE PRODUTOS ========== -->
    <section style="padding: 3rem 1rem;">
        <div class="container">
            <div style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 2rem;
            ">
                <?php foreach ($produtos as $index => $produto): ?>
                    <div class="spotlight-card stagger-item" style="animation-delay: <?php echo $index * 0.1; ?>s;">
                        <div class="spotlight-card-content">
                            <!-- Placeholder para imagem -->
                            <div style="
                                width: 100%;
                                height: 150px;
                                background: linear-gradient(135deg, #00ff00, #00cc00);
                                margin-bottom: 1rem;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-weight: bold;
                                color: #000;
                            ">
                                <?php echo $produto['nome']; ?>
                            </div>

                            <!-- Nome do produto -->
                            <h3 class="spotlight-card-title">
                                <?php echo $produto['nome']; ?>
                            </h3>

                            <!-- Descrição -->
                            <p class="spotlight-card-description">
                                <?php echo $produto['descricao']; ?>
                            </p>

                            <!-- Preço -->
                            <div class="spotlight-card-price">
                                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                            </div>

                            <!-- Botão -->
                            <button class="spotlight-card-btn" onclick="addToCart('<?php echo $produto['nome']; ?>', <?php echo $produto['preco']; ?>)">
                                Adicionar ao Carrinho
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========== CHAMADA PARA AÇÃO ========== -->
    <section style="
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1) 0%, rgba(0, 0, 0, 0.9) 100%);
        padding: 3rem 1rem;
        text-align: center;
    ">
        <div class="container">
            <h2 style="margin-bottom: 1rem;">Pronto para fazer seu pedido?</h2>
            <p style="margin-bottom: 2rem; color: #888;">
                Escolha seus itens e finalize sua compra.
            </p>
            <button class="btn" onclick="goToCheckout()">
                Ir para o Carrinho
            </button>
        </div>
    </section>
</main>

<footer>
    <div class="footer-content">
        <p>&copy; 2025 Byte_Burger. Todos os direitos reservados.</p>
        <p>Feito com 💚 e código.</p>
    </div>
</footer>

<script>
    /**
     * Função: Adicionar produto ao carrinho
     * @param {string} nome - Nome do produto
     * @param {number} preco - Preço do produto
     */
    function addToCart(nome, preco) {
        matrixLog(`Adicionado ao carrinho: ${nome} - R$ ${preco.toFixed(2)}`);
        alert(`${nome} adicionado ao carrinho! 🍔`);
    }

    /**
     * Função: Ir para o carrinho
     */
    function goToCheckout() {
        matrixLog('Redirecionando para o carrinho...');
        alert('Carrinho ainda não implementado! 🚧');
    }
</script>

<?php include 'componentes/footer.php'; ?>