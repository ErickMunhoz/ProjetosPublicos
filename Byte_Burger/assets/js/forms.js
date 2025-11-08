/**
 * BYTE_BURGER - FORMS.JS
 * ======================
 * Controla validação e feedback dos formulários
 * - Validação em tempo real
 * - Feedback visual
 * - Loading states
 */

/**
 * Função: Inicializar formulários
 * Chamada quando a página carrega (em main.js)
 */
function initForms() {
    matrixLog('Inicializando formulários...');
    
    // Pega todos os formulários da página
    const forms = document.querySelectorAll('form');
    
    if (forms.length === 0) {
        matrixLog('Nenhum formulário encontrado');
        return;
    }
    
    forms.forEach(form => {
        /**
         * EVENTO: Submit do formulário
         * Quando o usuário clica em enviar
         */
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validar formulário
            if (!form.checkValidity()) {
                matrixLog('Formulário inválido');
                showFormError(form, 'Por favor, preencha todos os campos corretamente.');
                return;
            }
            
            // Mostrar loading
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Enviando...';
            
            // Simular envio (em produção, seria uma requisição AJAX)
            setTimeout(() => {
                // Sucesso
                showFormSuccess(form, 'Mensagem enviada com sucesso! ✓');
                
                // Resetar botão
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
                
                // Limpar formulário
                form.reset();
                
                matrixLog('Formulário enviado com sucesso');
            }, 2000);
        });
        
        /**
         * EVENTO: Input em campos
         * Valida em tempo real
         */
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                // Remover mensagem de erro ao digitar
                const feedback = form.querySelector('.form-feedback');
                if (feedback) {
                    feedback.remove();
                }
            });
        });
    });
    
    matrixLog('Formulários inicializados com sucesso!');
}

/**
 * Função: Validar um campo
 * @param {HTMLElement} field - Campo a validar
 */
function validateField(field) {
    // Se o campo está vazio e não é obrigatório, não valida
    if (field.value === '' && !field.hasAttribute('required')) {
        return true;
    }
    
    // Validar tipo de campo
    if (field.type === 'email') {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(field.value);
    }
    
    if (field.type === 'tel') {
        const telRegex = /^[\d\s\-\(\)]+$/;
        return telRegex.test(field.value);
    }
    
    // Campos obrigatórios
    if (field.hasAttribute('required')) {
        return field.value !== '';
    }
    
    return true;
}

/**
 * Função: Mostrar mensagem de sucesso
 * @param {HTMLElement} form - Formulário
 * @param {string} message - Mensagem a exibir
 */
function showFormSuccess(form, message) {
    // Remover feedback anterior
    const oldFeedback = form.querySelector('.form-feedback');
    if (oldFeedback) {
        oldFeedback.remove();
    }
    
    // Criar novo feedback
    const feedback = document.createElement('div');
    feedback.className = 'form-feedback success';
    feedback.textContent = message;
    
    // Adicionar ao formulário
    form.appendChild(feedback);
    
    // Remover após 3 segundos
    setTimeout(() => {
        feedback.remove();
    }, 3000);
}

/**
 * Função: Mostrar mensagem de erro
 * @param {HTMLElement} form - Formulário
 * @param {string} message - Mensagem a exibir
 */
function showFormError(form, message) {
    // Remover feedback anterior
    const oldFeedback = form.querySelector('.form-feedback');
    if (oldFeedback) {
        oldFeedback.remove();
    }
    
    // Criar novo feedback
    const feedback = document.createElement('div');
    feedback.className = 'form-feedback error';
    feedback.textContent = message;
    
    // Adicionar ao formulário
    form.appendChild(feedback);
    
    // Remover após 5 segundos
    setTimeout(() => {
        feedback.remove();
    }, 5000);
}

