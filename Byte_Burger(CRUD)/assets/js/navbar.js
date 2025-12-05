/**
 * BYTE_BURGER - NAVBAR.JS
 * =======================
 * Controla a navegação (navbar)
 * - Menu hambúrguer em mobile
 * - Efeitos de hover
 * - Interatividade
 */

/**
 * Função: Inicializar a navbar
 * Chamada quando a página carrega (em main.js)
 */
function initNavbar() {
    matrixLog('Inicializando navbar...');
    
    // Pega os elementos da navbar
    const navbarToggle = document.querySelector('.navbar-toggle');
    const navbarMenu = document.querySelector('.navbar-menu');
    const navLinks = document.querySelectorAll('.nav-link');
    
    // Verificar se os elementos existem
    if (!navbarToggle || !navbarMenu) {
        matrixLog('Elementos da navbar não encontrados');
        return;
    }
    
    /**
     * EVENTO: Clique no botão hambúrguer
     * Quando o usuário clica no menu hambúrguer em mobile,
     * o menu aparece/desaparece
     */
    navbarToggle.addEventListener('click', function() {
        matrixLog('Menu hambúrguer clicado');
        toggleClass('.navbar-menu', 'active');
    });
    
    /**
     * EVENTO: Clique em um link do menu
     * Quando o usuário clica em um link, fecha o menu
     * (apenas em mobile)
     */
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Se for mobile, fecha o menu
            if (isMobile()) {
                removeClass('.navbar-menu', 'active');
            }
        });
    });
    
    /**
     * EVENTO: Redimensionar a janela
     * Se a janela ficar grande (desktop), garante que o menu fica visível
     */
    window.addEventListener('resize', function() {
        if (isDesktop()) {
            removeClass('.navbar-menu', 'active');
        }
    });
    
    matrixLog('Navbar inicializada com sucesso!');
}

// Exportar função (para usar em outros arquivos)
// Não é necessário em vanilla JS, mas é uma boa prática
