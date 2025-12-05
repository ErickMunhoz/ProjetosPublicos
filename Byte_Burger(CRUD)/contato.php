<?php
session_start();
/**
 * Página de contato
 * 
 * Formulário para os clientes entrarem em contato
 */

$page_title = 'Contato - Byte_Burger';
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
            <h1 style="margin-bottom: 1rem;">Entre em Contato</h1>
            <p style="color: #888;">Queremos ouvir você! Envie sua mensagem.</p>
        </div>
    </section>

    <!-- ========== FORMULÁRIO ========== -->
    <section style="padding: 3rem 1rem;">
        <div class="container" style="max-width: 600px;">
            <form method="POST" action="#" style="
                background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(10, 10, 10, 0.9) 100%);
                border: 2px solid #00cc00;
                padding: 2rem;
                border-radius: 0;
            ">
                <!-- Campo: Nome -->
                <div class="form-group">
                    <label for="nome">Nome *</label>
                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        required
                        placeholder="Seu nome completo">
                </div>

                <!-- Campo: Email -->
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        placeholder="seu@email.com">
                </div>

                <!-- Campo: Telefone -->
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input
                        type="tel"
                        id="telefone"
                        name="telefone"
                        placeholder="(11) 99999-9999">
                </div>

                <!-- Campo: Assunto -->
                <div class="form-group">
                    <label for="assunto">Assunto *</label>
                    <select id="assunto" name="assunto" required>
                        <option value="">Selecione um assunto</option>
                        <option value="duvida">Dúvida</option>
                        <option value="reclamacao">Reclamação</option>
                        <option value="sugestao">Sugestão</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>

                <!-- Campo: Mensagem -->
                <div class="form-group">
                    <label for="mensagem">Mensagem *</label>
                    <textarea
                        id="mensagem"
                        name="mensagem"
                        required
                        placeholder="Sua mensagem aqui..."></textarea>
                </div>

                <!-- Botão de envio -->
                <button type="submit" class="btn" style="width: 100%;">
                    Enviar Mensagem
                </button>
            </form>

            <!-- Informações de contato -->
            <div style="
                margin-top: 3rem;
                text-align: center;
                padding: 2rem;
                background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(10, 10, 10, 0.9) 100%);
                border: 2px solid #00cc00;
            ">
                <h3 style="margin-bottom: 1rem;">Outras formas de contato</h3>
                <p style="margin: 0.5rem 0;">
                    <strong>Telefone:</strong> (11) 3000-0000
                </p>
                <p style="margin: 0.5rem 0;">
                    <strong>Email:</strong> contato@byteburguer.com
                </p>
                <p style="margin: 0.5rem 0;">
                    <strong>Endereço:</strong> Rua do Código, 404 - São Paulo, SP
                </p>
            </div>
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