<?php
session_start();
// Título da página (usado no header)
$page_title = 'Byte_Burger - A melhor lanchonete do futuro';

// Incluir o header (abre as tags HTML)
include 'componentes/header.php';
?>

<!-- NAVBAR (menu de navegação) -->
<?php include 'componentes/nav.php'; ?>

<!-- CONTEÚDO PRINCIPAL -->
<main style="padding-top: 60px;">
    <!-- ========== SEÇÃO HERO ========== -->
    <!-- Esta é a primeira seção que o usuário vê -->
    <section style="
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1) 0%, rgba(0, 0, 0, 0.9) 100%);
        border-bottom: 2px solid #00ff00;
        padding: 4rem 1rem;
        text-align: center;
    ">
        <div class="container">
            <!-- Título principal -->
            <h1 style="
                font-size: 3rem;
                margin-bottom: 1rem;
                text-shadow: 0 0 20px rgba(0, 255, 0, 0.5);
            ">
                Bem-vindo à falha no teu apetite. Byte_Burger
            </h1>

            <!-- Subtítulo -->
            <p style="
                font-size: 1.25rem;
                color: #888;
                margin-bottom: 2rem;
            ">
                Hackeie o menu e prove o código na lanchonete digital onde cada mordida é uma referência a jornada do escolhido,
                e cada convidado faz parte da nossa família de hackers. Mergulhe em pratos icónicos, troque histórias com outros fãs.
                Pronto para se juntar à resistência na mesa? A Matrix te chama, sente-se na cadeira e conecte-se com sua equipe.
            </p>

            <!-- Botão de ação -->
            <a href="cardapio.php" class="btn">
                Ver Cardápio
            </a>
        </div>
    </section>

    <!-- ========== CARROSSEL ========== -->
    <!-- Mostra os principais produtos em um carrossel -->
    <section style="padding: 3rem 1rem; background: #000;">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 2rem;">Nossos Destaques</h2>
            <?php include 'componentes/carousel.php'; ?>
        </div>
    </section>

    <!-- ========== SEÇÃO DE INFORMAÇÕES ========== -->
    <!-- Mostra informações sobre a lanchonete -->
    <section style="
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.9) 0%, rgba(10, 10, 10, 0.95) 100%);
        padding: 3rem 1rem;
        border-top: 2px solid #00ff00;
        border-bottom: 2px solid #00ff00;
    ">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 2rem;">Por que escolher Byte_Burger?</h2>

            <!-- Grid de 3 colunas -->
            <div style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
            ">
                <!-- Card 1 -->
                <div class="card">
                    <h3 class="card-title">🚀 Rápido</h3>
                    <p class="card-description">
                        Preparamos seus lanches em tempo recorde, sem perder qualidade.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="card">
                    <h3 class="card-title">💚 Fresco</h3>
                    <p class="card-description">
                        Ingredientes frescos e de qualidade em cada código que você morde.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="card">
                    <h3 class="card-title">💻 Inovador</h3>
                    <p class="card-description">
                        Combinações únicas inspiradas no universo cinematográfico.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CHAMADA PARA AÇÃO ========== -->
    <!-- Encoraja o usuário a fazer um pedido -->
    <section style="
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1) 0%, rgba(0, 0, 0, 0.9) 100%);
        padding: 3rem 1rem;
        text-align: center;
    ">
        <div class="container">
            <h2 style="margin-bottom: 1rem;">Pronto para fazer seu pedido?</h2>
            <p style="margin-bottom: 2rem; color: #888;">
                Acesse nosso cardápio completo e escolha suas comidas e bebidas favoritas.
            </p>
            <a href="cardapio.php" class="btn">
                Ver Cardápio Completo
            </a>
        </div>
    </section>
</main>

<!-- FOOTER (rodapé) -->
<footer>
    <div class="footer-content">
        <p>&copy; 2025 Byte_Burger. Todos os direitos reservados.</p>
        <p>Feito com código assim como a matrix.</p>
    </div>
</footer>

<!-- Incluir o footer (fecha as tags HTML e carrega JavaScript) -->
<?php include 'componentes/footer.php'; ?>