/**
 * BYTE_BURGER - PAGE TRANSITIONS JS
 * =================================
 * Gerencia as transições suaves entre páginas
 */

/**
 * Inicializa as transições de página
 */
function initPageTransitions() {
    matrixLog('Inicializando transições de página...');

    // Adiciona classe para mostrar a página (fade in)
    // Pequeno delay para garantir que o CSS foi processado
    setTimeout(() => {
        document.body.classList.add('page-loaded');
    }, 50);

    // Intercepta cliques em links
    document.addEventListener('click', function (e) {
        // Procura o elemento <a> mais próximo (caso clique em um filho do link)
        const link = e.target.closest('a');

        // Se não for link, ignora
        if (!link) return;

        // Se tiver target="_blank", ignora (abre em nova aba)
        if (link.target === '_blank') return;

        // Se for link de âncora na mesma página (#), ignora
        if (link.getAttribute('href').startsWith('#')) return;

        // Se for link para email ou telefone, ignora
        if (link.getAttribute('href').startsWith('mailto:') ||
            link.getAttribute('href').startsWith('tel:')) return;

        // Verifica se é link interno (mesmo domínio)
        const href = link.href;
        const currentOrigin = window.location.origin;

        if (href.startsWith(currentOrigin) || href.startsWith('/')) {
            // Previne navegação imediata
            e.preventDefault();

            matrixLog('Navegando para: ' + href);

            // Inicia animação de saída
            document.body.classList.remove('page-loaded');
            document.body.classList.add('page-exiting');

            // Aguarda o tempo da transição antes de navegar
            setTimeout(() => {
                window.location.href = href;
            }, 500); // 500ms deve bater com o CSS transition
        }
    });
}

// Exporta para uso global (opcional em vanilla, mas bom para organização)
window.initPageTransitions = initPageTransitions;
