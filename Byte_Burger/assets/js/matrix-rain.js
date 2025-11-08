/**
 * BYTE_BURGER - MATRIX-RAIN.JS
 * =============================
 * Efeito Matrix Rain Canvas
 * Inspirado em: https://codepen.io/codelyds/pen/dPGXXZW
 */

/**
 * Função: Inicializar Matrix Rain
 * Cria o efeito de chuva de caracteres no canvas
 */
function initMatrixRain() {
    matrixLog('Inicializando Matrix Rain...');
    
    const canvas = document.getElementById('matrix-canvas');
    if (!canvas) {
        console.warn('Canvas #matrix-canvas não encontrado');
        return;
    }
    
    const ctx = canvas.getContext('2d');
    
    // Definir tamanho do canvas
    let w = canvas.width = window.innerWidth;
    let h = canvas.height = window.innerHeight;
    
    // Número de colunas
    const cols = Math.floor(w / 16) + 1;
    
    // Array para armazenar posição Y de cada coluna
    const ypos = Array(cols).fill(0);
    
    /**
     * Função: Desenhar matriz
     * Anima a chuva de caracteres
     */
    function drawMatrix() {
        // Limpar canvas com transparência (cria efeito de trilha)
        ctx.fillStyle = 'rgba(0, 0, 0, 0.08)';
        ctx.fillRect(0, 0, w, h);
        
        // Configurar cor e fonte
        ctx.fillStyle = '#00ff00';
        ctx.font = '14px monospace';
        
        // Desenhar caracteres
        for (let i = 0; i < ypos.length; i++) {
            // Gerar caractere aleatório
            const text = String.fromCharCode(33 + Math.random() * 94);
            const x = i * 16;
            
            // Desenhar caractere
            ctx.fillText(text, x, ypos[i] * 16);
            
            // Resetar posição se saiu da tela
            if (ypos[i] * 16 > h && Math.random() > 0.975) {
                ypos[i] = 0;
            } else {
                ypos[i]++;
            }
        }
    }
    
    /**
     * Função: Loop de animação
     * Usa requestAnimationFrame para performance
     */
    function animate() {
        drawMatrix();
        requestAnimationFrame(animate);
    }
    
    // Iniciar animação
    animate();
    
    // Redimensionar canvas quando a janela muda
    window.addEventListener('resize', () => {
        w = canvas.width = window.innerWidth;
        h = canvas.height = window.innerHeight;
    });
    
    matrixLog('Matrix Rain inicializado!');
}

/**
 * Função: Inicializar efeitos do terminal
 * Adiciona interatividade ao formulário de login
 */
function initTerminalEffects() {
    matrixLog('Inicializando efeitos do terminal...');
    
    // Efeito de digitação no log
    const termLog = document.querySelector('.term-log');
    if (termLog) {
        const messages = [
            'booting security modules...',
            'initializing encryption protocols...',
            'connecting to byte_burger servers...',
            'security core loaded. awaiting credentials.'
        ];
        
        let messageIndex = 0;
        let charIndex = 0;
        
        function typeMessage() {
            if (messageIndex < messages.length) {
                const message = messages[messageIndex];
                
                if (charIndex < message.length) {
                    termLog.textContent = message.substring(0, charIndex + 1);
                    charIndex++;
                    setTimeout(typeMessage, 50);
                } else {
                    messageIndex++;
                    charIndex = 0;
                    setTimeout(typeMessage, 1000);
                }
            }
        }
        
        typeMessage();
    }
    
    // Efeito de foco nos inputs
    const inputs = document.querySelectorAll('.input-wrap input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.borderBottomColor = '#00ff41';
            this.parentElement.style.boxShadow = '0 0 10px rgba(0, 255, 0, 0.3)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.borderBottomColor = '#00ff00';
            this.parentElement.style.boxShadow = 'none';
        });
    });
    
    matrixLog('Efeitos do terminal inicializados!');
}

/**
 * Função: Animar entrada do terminal
 */
function animateTerminalEntry() {
    const terminal = document.querySelector('.terminal');
    if (!terminal) return;
    
    gsap.fromTo(
        terminal,
        {
            opacity: 0,
            scale: 0.9,
            y: 50
        },
        {
            opacity: 1,
            scale: 1,
            y: 0,
            duration: 0.8,
            ease: 'back.out'
        }
    );
}

// Inicializar quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    initMatrixRain();
    initTerminalEffects();
    
    // Se GSAP estiver disponível, animar entrada
    if (typeof gsap !== 'undefined') {
        setTimeout(animateTerminalEntry, 200);
    }
});

