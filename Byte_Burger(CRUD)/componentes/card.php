<?php

/**
 * Componente reutilizável de card (cartão)
 * 
 * Exibe um produto em formato de cartão
 * Usado na página de cardápio para mostrar todos os produtos
 * 
 * Como usar:
 * <?php include 'componentes/card.php'; ?>
 */
?>

<!-- GRID DE CARDS -->
<div style="
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin: 2rem 0;
">
    <?php
    require_once __DIR__ . '/../config/conexao.php';

    $sql = "SELECT * FROM produto";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0):
        while ($product = mysqli_fetch_assoc($result)):
    ?>
            <!-- CARD: cada produto é um cartão -->
            <div class="card spotlight-card" style="
            --mouse-x: 50%;
            --mouse-y: 50%;
        ">
                <!-- Imagem do produto (placeholder) -->
                <div style="
                width: 100%;
                height: 180px;
                background: linear-gradient(135deg, #00ff00, #00cc00);
                border-bottom: 2px solid #00ff00;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
                overflow: hidden;
            ">
                    <?php if (!empty($product['imagemProduto'])): ?>
                        <img src="../Thegame/images/<?php echo $product['imagemProduto']; ?>" alt="<?php echo $product['nomeProduto']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <span style="color: #000; font-weight: bold; text-align: center;">
                            <?php echo $product['nomeProduto']; ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Informações do produto -->
                <div>
                    <h3 class="card-title">
                        <?php echo $product['nomeProduto']; ?>
                    </h3>

                    <p class="card-description">
                        <?php echo $product['fichaTecnica']; ?>
                    </p>

                    <p class="card-price">
                        R$ <?php echo number_format($product['precoProduto'], 2, ',', '.'); ?>
                    </p>

                    <!-- Botão de ação -->
                    <button class="btn" style="width: 100%; margin-top: 1rem;">
                        Adicionar ao Carrinho
                    </button>
                </div>
            </div>
        <?php
        endwhile;
    else:
        ?>
        <p style="color: #fff; text-align: center; grid-column: 1/-1;">Nenhum produto cadastrado.</p>
    <?php endif; ?>
</div>

<!-- EXPLICAÇÃO DO CARD:
     
     1. O PHP faz um loop em todos os produtos
     2. Para cada produto, cria um cartão (card)
     3. O CSS (components.css) estiliza os cards
     4. O efeito spotlight (hover) é controlado por CSS
     
     GRID RESPONSIVO:
     - Desktop: 4 colunas (250px cada)
     - Tablet: 2-3 colunas
     - Mobile: 1 coluna
     
     Isso é feito automaticamente pelo CSS:
     grid-template-columns: repeat(auto-fit, minmax(250px, 1fr))
-->