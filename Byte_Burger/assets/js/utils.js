/**
 * BYTE_BURGER - UTILS.JS
 * =====================
 * Arquivo com funções utilitárias reutilizáveis
 * Essas funções são usadas em vários lugares do site
 */

/**
 * Função: Adicionar classe a um elemento
 * @param {string} selector - Seletor CSS do elemento
 * @param {string} className - Nome da classe a adicionar
 */
function addClass(selector, className) {
    const element = document.querySelector(selector);
    if (element) {
        element.classList.add(className);
    }
}

/**
 * Função: Remover classe de um elemento
 * @param {string} selector - Seletor CSS do elemento
 * @param {string} className - Nome da classe a remover
 */
function removeClass(selector, className) {
    const element = document.querySelector(selector);
    if (element) {
        element.classList.remove(className);
    }
}

/**
 * Função: Alternar classe (add/remove)
 * @param {string} selector - Seletor CSS do elemento
 * @param {string} className - Nome da classe a alternar
 */
function toggleClass(selector, className) {
    const element = document.querySelector(selector);
    if (element) {
        element.classList.toggle(className);
    }
}

/**
 * Função: Verificar se elemento tem uma classe
 * @param {string} selector - Seletor CSS do elemento
 * @param {string} className - Nome da classe a verificar
 * @returns {boolean} - true se tem a classe, false caso contrário
 */
function hasClass(selector, className) {
    const element = document.querySelector(selector);
    return element ? element.classList.contains(className) : false;
}

/**
 * Função: Aguardar um tempo (útil para delays)
 * @param {number} ms - Tempo em milissegundos
 * @returns {Promise} - Promise que resolve após o tempo
 */
function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

/**
 * Função: Log no console com estilo Matrix
 * @param {string} message - Mensagem a exibir
 */
function matrixLog(message) {
    console.log(`%c[BYTE_BURGER] ${message}`, 'color: #00ff00; font-weight: bold; text-shadow: 0 0 10px #00ff00;');
}

/**
 * Função: Detectar se é mobile
 * @returns {boolean} - true se é mobile, false caso contrário
 */
function isMobile() {
    return window.innerWidth <= 480;
}

/**
 * Função: Detectar se é tablet
 * @returns {boolean} - true se é tablet, false caso contrário
 */
function isTablet() {
    return window.innerWidth > 480 && window.innerWidth <= 768;
}

/**
 * Função: Detectar se é desktop
 * @returns {boolean} - true se é desktop, false caso contrário
 */
function isDesktop() {
    return window.innerWidth > 768;
}

// Log inicial
matrixLog('Utils carregado com sucesso!');
