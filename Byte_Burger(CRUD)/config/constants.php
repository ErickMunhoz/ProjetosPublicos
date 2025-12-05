<?php
/**
 * Byte_Burger - Configurações Globais
 * Tema: Matrix com cores verde hacker
 */

// Informações da Lanchonete
define('APP_NAME', 'Byte_Burger');
define('APP_DESCRIPTION', 'A melhor lanchonete do futuro. Hamburguers feitos com código e paixão.');
define('APP_URL', 'http://localhost:8000');

// Cores do Tema Matrix
define('COLOR_PRIMARY', '#00ff00');      // Verde hacker
define('COLOR_DARK_BG', '#000000');      // Fundo preto
define('COLOR_SECONDARY', '#00cc00');    // Verde mais escuro
define('COLOR_ACCENT', '#00ff41');       // Verde brilhante
define('COLOR_TEXT_PRIMARY', '#00ff00'); // Texto verde
define('COLOR_TEXT_SECONDARY', '#888888'); // Texto cinza
define('COLOR_BORDER', '#00ff00');       // Bordas verdes

// Produtos (Menu)
$MENU_ITEMS = [
    [
        'id' => 1,
        'name' => 'Byte_Classic',
        'description' => 'Hamburger clássico com carne, alface, tomate e molho especial',
        'price' => 22.00,
        'category' => 'burgers',
        'image' => 'byte-classic.jpg'
    ],
    [
        'id' => 2,
        'name' => 'Bit_Bacon',
        'description' => 'Hamburger com bacon crocante, cheddar e molho barbecue',
        'price' => 25.00,
        'category' => 'burgers',
        'image' => 'bit-bacon.jpg'
    ],
    [
        'id' => 3,
        'name' => 'Mega_Byte',
        'description' => 'Hamburger duplo com todos os complementos. O maior da lanchonete!',
        'price' => 30.00,
        'category' => 'burgers',
        'image' => 'mega-byte.jpg'
    ],
    [
        'id' => 4,
        'name' => 'Cache_Fries',
        'description' => 'Batata frita crocante com tempero especial Matrix',
        'price' => 12.00,
        'category' => 'sides',
        'image' => 'cache-fries.jpg'
    ],
    [
        'id' => 5,
        'name' => 'Code_Cola',
        'description' => 'Refrigerante gelado para acompanhar seu byte',
        'price' => 8.00,
        'category' => 'drinks',
        'image' => 'code-cola.jpg'
    ],
    [
        'id' => 6,
        'name' => 'Pixel_Shake',
        'description' => 'Milkshake cremoso em vários sabores',
        'price' => 15.00,
        'category' => 'drinks',
        'image' => 'pixel-shake.jpg'
    ]
];

// Páginas do Site
$PAGES = [
    'home' => [
        'title' => 'Home - Byte_Burger',
        'url' => 'index.php',
        'label' => 'Home'
    ],
    'cardapio' => [
        'title' => 'Cardápio - Byte_Burger',
        'url' => 'cardapio.php',
        'label' => 'Cardápio'
    ],
    'contato' => [
        'title' => 'Contato - Byte_Burger',
        'url' => 'contato.php',
        'label' => 'Contato'
    ],
    'login' => [
        'title' => 'Login - Byte_Burger',
        'url' => 'login.php',
        'label' => 'Login'
    ]
];
?>
