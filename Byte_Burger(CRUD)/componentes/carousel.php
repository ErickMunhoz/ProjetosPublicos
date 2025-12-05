<?php

/**
 * Componente reutilizável do carrossel
 * 
 * Este arquivo contém a estrutura HTML do carrossel
 * A lógica (JavaScript) está em assets/js/carousel.js
 * Os estilos (CSS) estão em assets/css/components.css
 */

// Pega os produtos do banco de dados
require_once __DIR__ . '/../config/conexao.php';

// Buscar os 5 primeiros produtos para o carrossel
$sql = "SELECT * FROM produto LIMIT 6";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<!-- Erro na query: " . mysqli_error($conn) . " -->";
    $carousel_items = [];
} else {
    $carousel_items = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $carousel_items[] = $row;
    }
}

// Debug: Quantidade de itens encontrados
echo "<!-- Itens no carrossel: " . count($carousel_items) . " -->";

?>

<!-- CARROSSEL DE PRODUTOS -->
<div class="carousel-container">
    <!-- Wrapper: contém todos os slides -->
    <div class="carousel-wrapper">
        <?php
        // Dividir os produtos em grupos de 2
        $chunks = array_chunk($carousel_items, 2);

        foreach ($chunks as $index => $chunk):
        ?>
            <!-- SLIDE: contém 2 produtos -->
            <div class="carousel-item">
                <div class="carousel-slide-content">

                    <?php foreach ($chunk as $item): ?>
                        <!-- PRODUTO INDIVIDUAL -->
                        <div class="carousel-product-card">

                            <!-- Imagem do produto -->
                            <div class="carousel-product-image">
                                <?php if (!empty($item['imagemProduto'])): ?>
                                    <img src="../Thegame/images/<?php echo $item['imagemProduto']; ?>" alt="<?php echo $item['nomeProduto']; ?>">
                                <?php else: ?>
                                    <div class="no-image">
                                        Sem imagem
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Informações -->
                            <h3><?php echo $item['nomeProduto']; ?></h3>
                            <p class="description"><?php echo $item['fichaTecnica']; ?></p>
                            <p class="price">
                                R$ <?php echo number_format($item['precoProduto'], 2, ',', '.'); ?>
                            </p>
                            <a href="cardapio.php" class="btn btn-sm">Ver Detalhes</a>
                        </div>
                    <?php endforeach; ?>

                    <!-- Se o chunk tiver apenas 1 item, cria um espaço vazio para manter o alinhamento -->
                    <?php if (count($chunk) < 2): ?>
                        <div class="carousel-product-card placeholder"></div>
                    <?php endif; ?>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- CONTROLES: bolinhas para navegação -->
    <div class="carousel-controls">
        <?php foreach ($chunks as $index => $chunk): ?>
            <!-- Cada bolinha representa um slide (par de produtos) -->
            <div class="carousel-dot <?php echo $index === 0 ? 'active' : ''; ?>"
                data-slide="<?php echo $index; ?>">
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- EXPLICAÇÃO DO CARROSSEL:
     
     1. O PHP gera o HTML com todos os slides
     2. O CSS estiliza tudo (cores, tamanhos, etc)
     3. O JavaScript (carousel.js) controla:
        - Qual slide mostrar
        - Autoplay (muda a cada 5 segundos)
        - Pause on hover (pausa quando mouse passa)
        - Navegação por dots (clique nas bolinhas)
-->