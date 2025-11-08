<?php
/**
 * BYTE_BURGER - CARDAPIO.PHP
 * ==========================
 * Página de cardápio com todos os produtos
 */

$page_title = 'Cardápio - Byte_Burger';
include 'componentes/header.php';

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
