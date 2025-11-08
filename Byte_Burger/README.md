# 🍔 Byte_Burger - Site de Lanchonete

Um site profissional e responsivo para a lanchonete **Byte_Burger**, desenvolvido com **PHP, HTML, CSS e JavaScript vanilla**.

## 📋 Sobre o Projeto

**Byte_Burger** é uma lanchonete temática inspirada no universo **Matrix** com cores verde hacker (#00ff00) e fundo preto. O nome combina:
- **Byte**: Unidade de medida digital
- **Burger**: Hamburger (o que a lanchonete vende)
- **Logo**: Um hamburger mordido (inspirado no logo da Apple)

## 🎯 Características do MVP (Fase 1-2)

✅ **Homepage** com seção hero, carrossel e destaques
✅ **Cardápio** com grid responsivo de produtos
✅ **Página de Contato** com formulário
✅ **Página de Login** (placeholder)
✅ **Navbar** com menu e responsividade mobile
✅ **Tema Matrix** com cores verde hacker
✅ **Totalmente Responsivo** (mobile, tablet, desktop)
✅ **Código bem comentado** para aprendizado

## 📁 Estrutura do Projeto

```
byte_burger/
├── index.php                 # Homepage
├── cardapio.php              # Página de cardápio
├── contato.php               # Página de contato
├── login.php                 # Página de login
│
├── assets/
│   ├── css/
│   │   ├── main.css          # Estilos globais (cores, fontes, reset)
│   │   ├── components.css    # Estilos dos componentes (navbar, cards)
│   │   ├── animations.css    # Animações CSS puras (OPCIONAL)
│   │   └── responsive.css    # Media queries para responsividade
│   │
│   └── js/
│       ├── utils.js          # Funções utilitárias reutilizáveis
│       ├── navbar.js         # Lógica da navegação
│       ├── carousel.js       # Lógica do carrossel
│       ├── main.js           # Inicialização principal
│       └── gsap-animations.js # Animações GSAP (OPCIONAL - Fase 3)
│
├── componentes/
│   ├── header.php            # <head> e abertura do HTML
│   ├── nav.php               # Navbar (menu)
│   ├── footer.php            # Fechamento do HTML e scripts
│   ├── carousel.php          # Componente carrossel
│   └── card.php              # Componente card (produto)
│
├── config/
│   ├── constants.php         # Configurações e dados dos produtos
│   └── database.php          # Placeholder para BD (futuro)
│
└── README.md                 # Este arquivo
```

## 🚀 Como Usar

### 1. Requisitos
- **PHP 7.4+** instalado
- Um navegador moderno

### 2. Executar Localmente

```bash
# Navegue até a pasta do projeto
cd byte_burger

# Inicie o servidor PHP
php -S localhost:8000

# Abra no navegador
# http://localhost:8000
```

### 3. Estrutura de Arquivos Explicada

#### **Arquivos PHP (Lógica)**
- **index.php**: Página inicial com hero, carrossel e destaques
- **cardapio.php**: Exibe todos os produtos em grid
- **contato.php**: Formulário de contato
- **login.php**: Página de login (placeholder)

#### **Componentes PHP (Reutilizáveis)**
- **header.php**: Abre HTML, carrega CSS e meta tags
- **nav.php**: Menu de navegação (navbar)
- **footer.php**: Fecha HTML, carrega JavaScript
- **carousel.php**: Carrossel de produtos (autoplay + pause on hover)
- **card.php**: Grid de cards com todos os produtos

#### **Estilos CSS (Aparência)**
- **main.css**: Variáveis, reset, tipografia, botões, inputs
- **components.css**: Estilos da navbar, cards, carrossel, forms
- **responsive.css**: Media queries para mobile/tablet/desktop
- **animations.css**: Animações CSS puras (OPCIONAL)

#### **JavaScript (Interatividade)**
- **utils.js**: Funções utilitárias (addClass, removeClass, etc)
- **navbar.js**: Menu hambúrguer em mobile
- **carousel.js**: Autoplay, pause on hover, navegação por dots
- **main.js**: Inicializa tudo quando a página carrega
- **gsap-animations.js**: Animações avançadas (OPCIONAL - Fase 3)

## 🎨 Tema Matrix

### Cores Principais
```css
--primary: #00ff00;          /* Verde hacker (principal) */
--primary-dark: #00cc00;     /* Verde mais escuro */
--primary-light: #00ff41;    /* Verde brilhante */
--dark-bg: #000000;          /* Fundo preto */
--text-primary: #00ff00;     /* Texto verde */
--text-secondary: #888888;   /* Texto cinza */
```

### Tipografia
- **Font**: Courier New (monospace - estilo terminal)
- **Tamanhos**: 0.875rem a 3rem (responsivo)

## 📱 Responsividade

### Media Queries
```css
/* Desktop: 1200px+ */
/* Tablet: 768px a 1199px */
/* Mobile: 480px a 767px */
/* Extra Small: até 320px */
```

### Como Funciona
- **CSS Grid**: `grid-template-columns: repeat(auto-fit, minmax(250px, 1fr))`
  - Adapta automaticamente o número de colunas
  - Mínimo 250px por coluna
  - Máximo 1 coluna em mobile

- **Navbar**: Menu hambúrguer em mobile, menu horizontal em desktop
- **Padding/Margin**: Adaptáveis por media query

## 🔄 Fluxo de Carregamento

```
1. HTML carrega (estrutura)
   ↓
2. CSS carrega (estilos)
   ↓
3. JavaScript carrega (lógica)
   ↓
4. DOMContentLoaded dispara
   ↓
5. initNavbar() - menu interativo
6. initCarousel() - carrossel autoplay
   ↓
7. Página pronta para interação!
```

## 📚 Aprendizado: Conceitos Principais

### 1. **Include em PHP**
```php
<?php include 'componentes/header.php'; ?>
```
- Carrega o conteúdo de outro arquivo PHP
- Reutiliza código (DRY - Don't Repeat Yourself)

### 2. **Media Queries em CSS**
```css
@media (max-width: 768px) {
    /* Estilos para telas pequenas */
}
```
- Aplica estilos apenas em certos tamanhos de tela
- Essencial para responsividade

### 3. **JavaScript Events**
```javascript
element.addEventListener('click', function() {
    // Código executado ao clicar
});
```
- Escuta ações do usuário (clique, hover, scroll, etc)
- Permite interatividade

### 4. **CSS Grid**
```css
display: grid;
grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
```
- Layout automático e responsivo
- Adapta número de colunas conforme espaço

## 🎯 Próximas Fases (Futuro)

### Fase 3: Animações GSAP
- Animações de texto (decrypted text)
- Fade content ao scroll
- Efeitos de spotlight nos cards
- Background com letter glitch

### Fase 4: Polimento
- Otimização de performance
- SEO
- Testes de compatibilidade
- Melhorias de UX

## 📝 Comentários no Código

**Todos os arquivos têm comentários explicativos:**
- O que cada seção faz
- Por que foi feito assim
- Como modificar

**Exemplo:**
```php
<?php
/**
 * BYTE_BURGER - INDEX.PHP
 * =======================
 * Página inicial (homepage)
 * 
 * Estrutura:
 * 1. Header (HTML, CSS, meta tags)
 * 2. Navbar (menu de navegação)
 * 3. Seção Hero (boas-vindas)
 * ...
 */
```

## 🔧 Customização

### Mudar Cores
Edite `assets/css/main.css`:
```css
:root {
    --primary: #00ff00;  /* Mude para outra cor */
}
```

### Adicionar Produtos
Edite `config/constants.php`:
```php
$MENU_ITEMS = [
    [
        'name' => 'Novo Produto',
        'description' => 'Descrição',
        'price' => 25.00,
        'category' => 'burgers'
    ]
];
```

### Modificar Navbar
Edite `componentes/nav.php` para adicionar/remover links

## 📄 Licença

Projeto educacional para fins de aprendizado.

---

**Desenvolvido com 💚 e código**
Byte_Burger - 2025
