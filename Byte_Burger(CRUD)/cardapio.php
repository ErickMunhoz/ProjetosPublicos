<?php
session_start();
/**
 * Página de cardápio
 * 
 * Exibe todos os produtos em formato de grid
 * com cards interativos
 */

$page_title = 'Cardápio - Byte_Burger';
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
            <h1 style="margin-bottom: 1rem;">Nosso Cardápio</h1>
            <p style="color: #888;">Escolha seus lanches favoritos e aproveite!</p>
        </div>
    </section>

    <!-- ========== GRID DE PRODUTOS ========== -->
    <section style="padding: 3rem 1rem;">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 2rem;">Todos os Produtos</h2>

            <!-- Incluir o componente card (exibe todos os produtos) -->
            <?php include 'componentes/card.php'; ?>
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