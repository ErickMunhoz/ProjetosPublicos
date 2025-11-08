/**
 * BYTE_BURGER - SCROLL-ANIMATIONS.JS
 * ===================================
 * Animações ao scroll usando Intersection Observer (sem GSAP)
 * Funciona 100% offline
 */

/**
 * Função: Inicializar Intersection Observer
 * Detecta quando elementos entram na viewport
 */
function initScrollAnimations() {
    matrixLog('Inicializando animações ao scroll...');
    
    // Criar Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            // Se o elemento entrou na viewport
            if (entry.isIntersecting) {
                // Adicionar classe de animação
                entry.target.classList.add('animated');
                
                // Parar de observar (anima apenas uma vez)
                observer.unobserve(entry.target);
            }
        });
    }, {
        // Disparar quando 20% do elemento está visível
        threshold: 0.2
    });
    
    // Observar todos os elementos com classe "fade-on-scroll"
    document.querySelectorAll('.fade-on-scroll').forEach(element => {
        observer.observe(element);
    });
    
    // Observar todos os elementos com classe "stagger-item"
    document.querySelectorAll('.stagger-item').forEach(element => {
        observer.observe(element);
    });
    
    // Observar todos os elementos com classe "fade-content"
    document.querySelectorAll('.fade-content').forEach(element => {
        observer.observe(element);
    });
    
    matrixLog('Animações ao scroll inicializadas!');
}

/**
 * Função: Animar entrada de página
 * Usa CSS animation
 */
function animatePageEntry() {
    const main = document.querySelector('main');
    if (main) {
        main.style.animation = 'fadeInUp 0.6s ease-out forwards';
    }
}

/**
 * Função: Parallax ao scroll (sem GSAP)
 * Efeito de movimento lento em elementos
 */
function initParallax() {
    matrixLog('Inicializando efeito parallax...');
    
    const parallaxElements = document.querySelectorAll('.parallax');
    
    if (parallaxElements.length === 0) return;
    
    window.addEventListener('scroll', () => {
        parallaxElements.forEach(element => {
            // Calcular velocidade de scroll
            const scrollPosition = window.pageYOffset;
            const elementOffset = element.offsetTop;
            const distance = scrollPosition - elementOffset;
            
            // Aplicar transformação
            element.style.transform = `translateY(${distance * 0.5}px)`;
        });
    }, { passive: true });
    
    matrixLog('Parallax inicializado!');
}

/**
 * Função: Hover effects nos cards
 * Sem GSAP, usando CSS e JavaScript
 */
function initCardHoverEffects() {
    matrixLog('Inicializando efeitos de hover nos cards...');
    
    const cards = document.querySelectorAll('.spotlight-card');
    
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            // Atualizar variáveis CSS
            card.style.setProperty('--mouse-x', x + 'px');
            card.style.setProperty('--mouse-y', y + 'px');
        });
    });
    
    matrixLog('Efeitos de hover inicializados!');
}

/**
 * Função: Smooth scroll para links internos
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Inicializar quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    initScrollAnimations();
    initParallax();
    initCardHoverEffects();
    initSmoothScroll();
    animatePageEntry();
});

