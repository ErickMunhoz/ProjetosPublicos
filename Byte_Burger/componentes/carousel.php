<?php
/**
 * BYTE_BURGER - CAROUSEL.PHP
 * ==========================
 * Componente reutilizável do carrossel
 * 
 * Este arquivo contém a estrutura HTML do carrossel
 * A lógica (JavaScript) está em assets/js/carousel.js
 * Os estilos (CSS) estão em assets/css/components.css
 */

// Pega os produtos do arquivo de constantes
require_once __DIR__ . '/../config/constants.php';

// Filtrar apenas os produtos da categoria "burgers" para o carrossel
$carousel_items = array_filter($MENU_ITEMS, function($item) {
    return $item['category'] === 'burgers';
});
?>

<!-- CARROSSEL DE PRODUTOS -->
<div class="carousel-container">
    <!-- Wrapper: contém todos os slides -->
    <div class="carousel-wrapper">
        <?php foreach($carousel_items as $index => $item): ?>
            <!-- SLIDE: cada produto é um slide -->
            <div class="carousel-item">
                <div class="carousel-content">
                    <!-- Imagem do produto (placeholder) -->
                    <div class="carousel-image" style="
                        width: 200px;
                        height: 200px;
                        background: linear-gradient(135deg, #00ff00, #00cc00);
                        border: 2px solid #00ff00;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-bottom: 1rem;
                        border-radius: 0;
                    ">
                        <span style="color: #000; font-weight: bold; text-align: center;">
                            <?php echo $item['name']; ?>
                        </span>
                    </div>
                    
                    <!-- Informações do produto -->
                    <h3 style="color: #00ff00; margin-bottom: 0.5rem;">
                        <?php echo $item['name']; ?>
                    </h3>
                    <p style="color: #888; margin-bottom: 1rem;">
                        <?php echo $item['description']; ?>
                    </p>
                    <p style="color: #00ff41; font-size: 1.5rem; font-weight: bold;">
                        R$ <?php echo number_format($item['price'], 2, ',', '.'); ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <!-- CONTROLES: bolinhas para navegação -->
    <div class="carousel-controls">
        <?php foreach($carousel_items as $index => $item): ?>
            <!-- Cada bolinha representa um slide -->
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
