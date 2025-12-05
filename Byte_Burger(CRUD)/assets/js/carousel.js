/**
 * BYTE_BURGER - CAROUSEL.JS
 * =========================
 * Controla o carrossel de produtos
 * - Autoplay (muda de slide automaticamente)
 * - Pause on hover (pausa quando mouse passa por cima)
 * - Navegação por dots (bolinhas)
 */

// Variáveis globais do carrossel
let currentSlide = 0;
let carouselInterval = null;
const SLIDE_DURATION = 5000; // 5 segundos entre slides

/**
 * Função: Inicializar o carrossel
 * Chamada quando a página carrega (em main.js)
 */
function initCarousel() {
    matrixLog('Inicializando carrossel...');
    
    // Pega os elementos do carrossel
    const carouselContainer = document.querySelector('.carousel-container');
    const carouselDots = document.querySelectorAll('.carousel-dot');
    
    // Verificar se os elementos existem
    if (!carouselContainer || carouselDots.length === 0) {
        matrixLog('Elementos do carrossel não encontrados');
        return;
    }
    
    /**
     * Função: Mostrar um slide específico
     * @param {number} index - Índice do slide a mostrar (0, 1, 2, etc)
     */
    function showSlide(index) {
        const wrapper = document.querySelector('.carousel-wrapper');
        const totalSlides = document.querySelectorAll('.carousel-item').length;
        
        // Validar índice (se for maior que total, volta para 0)
        if (index >= totalSlides) {
            currentSlide = 0;
        } else if (index < 0) {
            currentSlide = totalSlides - 1;
        } else {
            currentSlide = index;
        }
        
        // Mover o carrossel (cada slide tem 100% de largura)
        const offset = -currentSlide * 100;
        wrapper.style.transform = `translateX(${offset}%)`;
        
        // Atualizar os dots (bolinhas)
        carouselDots.forEach((dot, i) => {
            if (i === currentSlide) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
        
        matrixLog(`Slide ${currentSlide + 1} exibido`);
    }
    
    /**
     * Função: Próximo slide
     */
    function nextSlide() {
        showSlide(currentSlide + 1);
    }
    
    /**
     * Função: Slide anterior
     */
    function prevSlide() {
        showSlide(currentSlide - 1);
    }
    
    /**
     * Função: Iniciar autoplay
     * Muda de slide automaticamente a cada SLIDE_DURATION ms
     */
    function startAutoplay() {
        carouselInterval = setInterval(nextSlide, SLIDE_DURATION);
        matrixLog('Autoplay iniciado');
    }
    
    /**
     * Função: Parar autoplay
     */
    function stopAutoplay() {
        clearInterval(carouselInterval);
        matrixLog('Autoplay pausado');
    }
    
    /**
     * EVENTO: Clique nos dots
     * Quando o usuário clica em um dot, vai para aquele slide
     */
    carouselDots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            showSlide(index);
            stopAutoplay();
            startAutoplay(); // Reinicia o autoplay
        });
    });
    
    /**
     * EVENTO: Mouse entra no carrossel
     * Quando o mouse passa por cima, pausa o autoplay
     */
    carouselContainer.addEventListener('mouseenter', function() {
        stopAutoplay();
    });
    
    /**
     * EVENTO: Mouse sai do carrossel
     * Quando o mouse sai, retoma o autoplay
     */
    carouselContainer.addEventListener('mouseleave', function() {
        startAutoplay();
    });
    
    // Inicializar o primeiro slide
    showSlide(0);
    
    // Iniciar o autoplay
    startAutoplay();
    
    matrixLog('Carrossel inicializado com sucesso!');
}

