/**
 * BYTE_BURGER - DECRYPTED-TEXT.JS
 * ================================
 * Efeito de descriptografia de texto ao passar o mouse
 * Inspirado em: https://www.reactbits.dev/text-animations/decrypted-text
 */

/**
 * Caracteres aleatórios para usar na criptografia
 */
const RANDOM_CHARS = '!@#$%^&*()_+-=[]{}|;:,.<>?/~`';

/**
 * Inicializa o efeito decrypted-text
 * Procura por todos os elementos com a classe 'decrypted-text'
 * e adiciona o efeito de hover
 */
function initDecryptedText() {
    const elements = document.querySelectorAll('.decrypted-text');
    
    elements.forEach(element => {
        const originalText = element.textContent.trim();
        
        // Armazenar o texto original no elemento
        element.dataset.originalText = originalText;
        
        // Adicionar eventos de mouse
        element.addEventListener('mouseenter', () => {
            decryptText(element, originalText);
        });
        
        element.addEventListener('mouseleave', () => {
            element.textContent = originalText;
        });
    });
}

/**
 * Anima o efeito de descriptografia
 * @param {HTMLElement} element - Elemento a animar
 * @param {string} originalText - Texto original
 */
function decryptText(element, originalText) {
    const textLength = originalText.length;
    const speed = 50; // Milissegundos entre cada iteração
    const maxIterations = 10; // Número máximo de iterações
    
    let iteration = 0;
    
    function animate() {
        let decryptedText = '';
        
        for (let i = 0; i < textLength; i++) {
            // Calcular a probabilidade de revelar este caractere
            const revealProbability = iteration / maxIterations;
            
            // Se passou da iteração máxima, mostrar o caractere original
            if (Math.random() < revealProbability || iteration >= maxIterations) {
                decryptedText += originalText[i];
            } else {
                // Mostrar um caractere aleatório
                decryptedText += RANDOM_CHARS[Math.floor(Math.random() * RANDOM_CHARS.length)];
            }
        }
        
        element.textContent = decryptedText;
        iteration++;
        
        // Continuar animando até revelar todo o texto
        if (iteration <= maxIterations) {
            setTimeout(animate, speed);
        } else {
            element.textContent = originalText;
        }
    }
    
    animate();
}

/**
 * Inicializar quando o DOM estiver pronto
 */
document.addEventListener('DOMContentLoaded', initDecryptedText);

