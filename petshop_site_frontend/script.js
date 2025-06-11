// Sistema de Carrinho de Compras
let cart = JSON.parse(localStorage.getItem('petshop_cart')) || [];

// Função para adicionar produto ao carrinho
function addToCart(name, price, image, type = 'produto') {
    const existingItem = cart.find(item => item.name === name);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: Date.now(),
            name: name,
            price: price,
            image: image,
            type: type,
            quantity: 1
        });
    }
    
    saveCart();
    updateCartDisplay();
    showCartNotification(name);
}

// Função para adicionar serviço ao carrinho
function addServiceToCart(name, price, description) {
    addToCart(name, price, './placeholder_icon_service.png', 'servico');
}

// Função para remover item do carrinho
function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    saveCart();
    updateCartDisplay();
}

// Função para atualizar quantidade
function updateQuantity(id, newQuantity) {
    if (newQuantity <= 0) {
        removeFromCart(id);
        return;
    }
    
    const item = cart.find(item => item.id === id);
    if (item) {
        item.quantity = newQuantity;
        saveCart();
        updateCartDisplay();
    }
}

// Função para salvar carrinho no localStorage
function saveCart() {
    localStorage.setItem('petshop_cart', JSON.stringify(cart));
}

// Função para calcular total do carrinho
function getCartTotal() {
    return cart.reduce((total, item) => total + (item.price * item.quantity), 0);
}

// Função para obter quantidade total de itens
function getCartItemCount() {
    return cart.reduce((total, item) => total + item.quantity, 0);
}

// Função para mostrar notificação de item adicionado
function showCartNotification(itemName) {
    // Remove notificação existente se houver
    const existingNotification = document.querySelector('.cart-notification');
    if (existingNotification) {
        existingNotification.remove();
    }
    
    // Cria nova notificação
    const notification = document.createElement('div');
    notification.className = 'cart-notification';
    notification.innerHTML = `
        <div class="notification-content">
            <span>✅ ${itemName} adicionado ao carrinho!</span>
            <button onclick="this.parentElement.parentElement.remove()">×</button>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Remove automaticamente após 3 segundos
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 3000);
}

// Função para atualizar display do carrinho
function updateCartDisplay() {
    const cartCount = document.querySelector('.cart-count');
    const cartIcon = document.querySelector('.cart-icon');
    
    if (cartCount) {
        const itemCount = getCartItemCount();
        cartCount.textContent = itemCount;
        cartCount.style.display = itemCount > 0 ? 'block' : 'none';
    }
}

// Função para mostrar/esconder carrinho
function toggleCart() {
    const cartSidebar = document.querySelector('.cart-sidebar');
    if (cartSidebar) {
        cartSidebar.classList.toggle('open');
        renderCartItems();
    }
}

// Função para renderizar itens do carrinho
function renderCartItems() {
    const cartItems = document.querySelector('.cart-items');
    const cartTotal = document.querySelector('.cart-total');
    
    if (!cartItems) return;
    
    if (cart.length === 0) {
        cartItems.innerHTML = '<p class="empty-cart">Seu carrinho está vazio</p>';
        if (cartTotal) cartTotal.textContent = 'Total: R$ 0,00';
        return;
    }
    
    cartItems.innerHTML = cart.map(item => `
        <div class="cart-item">
            <img src="${item.image}" alt="${item.name}" class="cart-item-image">
            <div class="cart-item-info">
                <h4>${item.name}</h4>
                <p class="cart-item-type">${item.type === 'servico' ? 'Serviço' : 'Produto'}</p>
                <p class="cart-item-price">R$ ${item.price.toFixed(2)}</p>
                <div class="quantity-controls">
                    <button onclick="updateQuantity(${item.id}, ${item.quantity - 1})">-</button>
                    <span>${item.quantity}</span>
                    <button onclick="updateQuantity(${item.id}, ${item.quantity + 1})">+</button>
                </div>
            </div>
            <button class="remove-item" onclick="removeFromCart(${item.id})">🗑️</button>
        </div>
    `).join('');
    
    if (cartTotal) {
        cartTotal.textContent = `Total: R$ ${getCartTotal().toFixed(2)}`;
    }
}

// Função para ir para checkout
function goToCheckout() {
    if (cart.length === 0) {
        alert('Seu carrinho está vazio!');
        return;
    }
    window.location.href = 'checkout.html';
}

// Função para limpar carrinho
function clearCart() {
    if (confirm('Tem certeza que deseja limpar o carrinho?')) {
        cart = [];
        saveCart();
        updateCartDisplay();
        renderCartItems();
    }
}

// Função para mostrar/esconder menu mobile
function MostraEscondeMenu() {
    const navbar = document.querySelector('.navbar');
    navbar.classList.toggle('show');
}

// Função para alternar tema
function toggleTheme() {
    document.body.classList.toggle('dark-mode');
    const themeToggle = document.getElementById('theme-toggle');
    
    if (document.body.classList.contains('dark-mode')) {
        themeToggle.textContent = '☀️';
        localStorage.setItem('theme', 'dark');
    } else {
        themeToggle.textContent = '🌙';
        localStorage.setItem('theme', 'light');
    }
}

// Inicialização quando a página carrega
document.addEventListener('DOMContentLoaded', function() {
    // Carrega tema salvo
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) themeToggle.textContent = '☀️';
    }
    
    // Configura botão de tema
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', toggleTheme);
    }
    
    // Atualiza display do carrinho
    updateCartDisplay();
    
    // Adiciona ícone do carrinho se não existir
    addCartIcon();
});

// Função para adicionar ícone do carrinho na navbar
function addCartIcon() {
    const navbar = document.querySelector('.navbar');
    if (navbar && !document.querySelector('.cart-icon')) {
        const cartIcon = document.createElement('div');
        cartIcon.className = 'cart-icon';
        cartIcon.innerHTML = `
            <button onclick="toggleCart()" class="cart-button">
                🛒
                <span class="cart-count">0</span>
            </button>
        `;
        
        // Insere antes do botão de tema
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            navbar.insertBefore(cartIcon, themeToggle);
        } else {
            navbar.appendChild(cartIcon);
        }
    }
}


// Função para mostrar informações do produto
function showProductInfo(productName, productDescription) {
    // Remove modal existente se houver
    const existingModal = document.querySelector('.product-modal');
    if (existingModal) {
        existingModal.remove();
    }
    
    // Cria o modal
    const modal = document.createElement('div');
    modal.className = 'product-modal';
    modal.innerHTML = `
        <div class="modal-overlay" onclick="closeProductModal()"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h3>${productName}</h3>
                <button onclick="closeProductModal()" class="close-modal">×</button>
            </div>
            <div class="modal-body">
                <p>${productDescription}</p>
                <div class="modal-info">
                    <p><strong>📦 Entrega:</strong> Grátis para compras acima de R$ 100,00</p>
                    <p><strong>🔄 Troca:</strong> Até 30 dias para troca</p>
                    <p><strong>⭐ Avaliação:</strong> ⭐⭐⭐⭐⭐ (4.8/5)</p>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="closeProductModal()" class="btn-secondary">Fechar</button>
                <button onclick="closeProductModal(); addToCart('${productName}', getProductPrice('${productName}'), getProductImage('${productName}'))" class="btn-primary">Adicionar ao Carrinho</button>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Adiciona animação
    setTimeout(() => {
        modal.classList.add('show');
    }, 10);
}

// Função para fechar modal do produto
function closeProductModal() {
    const modal = document.querySelector('.product-modal');
    if (modal) {
        modal.classList.remove('show');
        setTimeout(() => {
            modal.remove();
        }, 300);
    }
}

// Função auxiliar para obter preço do produto
function getProductPrice(productName) {
    const prices = {
        'Ração Premium para Cães': 79.90,
        'Ração Premium para Gatos': 69.90,
        'Brinquedo Interativo': 29.90,
        'Cama Confortável': 99.90,
        'Coleira Estilosa': 39.90,
        'Shampoo Especial': 24.90,
        'Petisco Natural': 15.90,
        'Vitamina para Pets': 37.90
    };
    return prices[productName] || 0;
}

// Função auxiliar para obter imagem do produto
function getProductImage(productName) {
    const images = {
        'Ração Premium para Cães': './imagens/placeholder_racao.png',
        'Ração Premium para Gatos': './imagens/placeholder_racao_gato.png',
        'Brinquedo Interativo': './imagens/placeholder_brinquedo.png',
        'Cama Confortável': './imagens/placeholder_cama.png',
        'Coleira Estilosa': './imagens/placeholder_coleira.png',
        'Shampoo Especial': './imagens/placeholder_shampoo.png',
        'Petisco Natural': './imagens/petisco_natural_desenho_v3.webp',
        'Vitamina para Pets': './imagens/vitamina_pets_desenho_v2.webp'
    };
    return images[productName] || './placeholder_icon_pet.png';
}

