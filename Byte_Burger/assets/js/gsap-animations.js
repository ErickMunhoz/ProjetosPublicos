/**
 * BYTE_BURGER - GSAP-ANIMATIONS.JS
 * =================================
 * Animações avançadas usando GSAP
 * Biblioteca: https://gsap.com/
 */

/**
 * Função: Inicializar animações GSAP
 * Chamada quando a página carrega
 */
function initGSAPAnimations() {
    matrixLog('Inicializando animações GSAP...');
    
    // Registrar o ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);
    
    // ========== ANIMAÇÕES DE FADE ON SCROLL ==========
    // Elementos com classe "fade-on-scroll" aparecem ao entrar na viewport
    gsap.utils.toArray('.fade-on-scroll').forEach(element => {
        gsap.fromTo(
            element,
            {
                opacity: 0,
                y: 50
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                scrollTrigger: {
                    trigger: element,
                    start: 'top 80%',
                    end: 'top 20%',
                    scrub: false,
                    markers: false
                }
            }
        );
    });
    
    // ========== ANIMAÇÕES DE CARDS ==========
    // Cards com classe "stagger-item" aparecem em cascata
    gsap.utils.toArray('.stagger-item').forEach((element, index) => {
        gsap.fromTo(
            element,
            {
                opacity: 0,
                y: 30,
                scale: 0.95
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.6,
                delay: index * 0.1,
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    scrub: false
                }
            }
        );
    });
    
    // ========== ANIMAÇÕES DE TÍTULOS ==========
    // Títulos com classe "decrypted-text" ganham efeito ao entrar na viewport
    gsap.utils.toArray('.decrypted-text').forEach(element => {
        gsap.fromTo(
            element,
            {
                opacity: 0
            },
            {
                opacity: 1,
                duration: 1,
                scrollTrigger: {
                    trigger: element,
                    start: 'top 90%',
                    scrub: false
                }
            }
        );
    });
    
    // ========== HOVER ANIMATIONS PARA CARDS ==========
    // Cards ganham efeito de spotlight ao passar o mouse
    document.querySelectorAll('.spotlight-card').forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            // Atualizar variáveis CSS para o efeito de spotlight
            this.style.setProperty('--mouse-x', x + 'px');
            this.style.setProperty('--mouse-y', y + 'px');
            
            // Animar o card
            gsap.to(this, {
                duration: 0.3,
                boxShadow: `0 0 30px rgba(0, 255, 0, 0.5)`
            });
        });
        
        card.addEventListener('mouseleave', function() {
            gsap.to(this, {
                duration: 0.3,
                boxShadow: `0 0 20px rgba(0, 255, 0, 0.3)`
            });
        });
    });
    
    // ========== PARALLAX EFFECT ==========
    // Efeito parallax em elementos com classe "parallax"
    gsap.utils.toArray('.parallax').forEach(element => {
        gsap.to(element, {
            y: (i, target) => -ScrollTrigger.getVelocity(target) * 0.2,
            scrollTrigger: {
                trigger: element,
                onUpdate: (self) => {
                    gsap.to(element, {
                        y: self.getVelocity() * -0.2,
                        overwrite: 'auto',
                        duration: 0.8
                    });
                }
            }
        });
    });
    
    matrixLog('Animações GSAP inicializadas!');
}

/**
 * Função: Animar elemento ao clicar
 * @param {HTMLElement} element - Elemento a animar
 */
function animateOnClick(element) {
    gsap.to(element, {
        duration: 0.3,
        scale: 0.95,
        onComplete: () => {
            gsap.to(element, {
                duration: 0.3,
                scale: 1
            });
        }
    });
}

/**
 * Função: Animar entrada de página
 * Chamada quando uma página carrega
 */
function animatePageEntry() {
    gsap.fromTo(
        'main',
        {
            opacity: 0,
            y: 20
        },
        {
            opacity: 1,
            y: 0,
            duration: 0.6,
            ease: 'power2.out'
        }
    );
}

/**
 * Função: Animar saída de página
 * Chamada antes de navegar para outra página
 */
function animatePageExit() {
    return gsap.to('main', {
        opacity: 0,
        y: -20,
        duration: 0.4,
        ease: 'power2.in'
    });
}

