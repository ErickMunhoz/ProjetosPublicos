<?php
// Determina o caminho base dependendo de onde o arquivo está sendo incluído
// Se estivermos na pasta admin, o base_path deve ser ../
// Verificamos se o script atual está dentro da pasta admin
$current_script_path = $_SERVER['SCRIPT_NAME'];
$base_path = (strpos($current_script_path, '/admin/') !== false) ? '../' : '';
?>
<nav class="navbar-dock">
    <div class="navbar-container">
        <a href="<?php echo $base_path; ?>index.php" class="navbar-logo">
            <span class="logo-text">Byte_Burger</span>
        </a>

        <ul class="navbar-menu">
            <li><a href="<?php echo $base_path; ?>index.php" class="nav-link">Home</a></li>
            <li><a href="<?php echo $base_path; ?>cardapio.php" class="nav-link">Cardápio</a></li>
            <li><a href="<?php echo $base_path; ?>contato.php" class="nav-link">Contato</a></li>

            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
                <li><a href="<?php echo $base_path; ?>admin/listar.php" class="nav-link" style="color: #0f0;">Admin</a></li>
                <li><a href="<?php echo $base_path; ?>logout.php" class="nav-link nav-link-logout" style="color: #ff0000;">Sair</a></li>
            <?php else: ?>
                <li><a href="<?php echo $base_path; ?>login.php" class="nav-link">Login</a></li>
            <?php endif; ?>
        </ul>

        <div class="navbar-toggle">
            <span class="toggle-line"></span>
            <span class="toggle-line"></span>
            <span class="toggle-line"></span>
        </div>
    </div>
</nav>