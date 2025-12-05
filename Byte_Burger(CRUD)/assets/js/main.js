/**
 * BYTE_BURGER - MAIN.JS
 * =====================
 * Arquivo principal que inicializa tudo
 * Este arquivo é o "maestro" que coordena todos os outros
 */

/**
 * EVENTO: DOMContentLoaded
 * Dispara quando o HTML foi completamente carregado
 * (não espera imagens e CSS, apenas o HTML)
 * 
 * É aqui que inicializamos todos os componentes
 */
document.addEventListener('DOMContentLoaded', function() {
    matrixLog('=== BYTE_BURGER INICIANDO ===');
    
    // Inicializar navbar (menu)
    initNavbar();
    
    // Inicializar carrossel (slides de produtos)
    initCarousel();
    
    matrixLog('=== BYTE_BURGER PRONTO ===');
});

/**
 * EVENTO: Load
 * Dispara quando TUDO foi carregado (HTML, CSS, imagens, etc)
 * Útil para coisas que precisam de imagens carregadas
 */
window.addEventListener('load', function() {
    matrixLog('Página totalmente carregada!');
});

/**
 * EVENTO: Erro não capturado
 * Se algo der errado, mostra o erro no console
 */
window.addEventListener('error', function(event) {
    console.error('Erro não capturado:', event.error);
});

