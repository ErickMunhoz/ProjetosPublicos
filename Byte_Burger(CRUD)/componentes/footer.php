<?php
// Determina o caminho base (mesma lógica da nav.php)
$current_script_path = $_SERVER['SCRIPT_NAME'];
$base_path = (strpos($current_script_path, '/admin/') !== false) ? '../' : '';
?>
<!-- Scripts JavaScript -->
<script src="<?php echo $base_path; ?>assets/js/utils.js"></script>
<script src="<?php echo $base_path; ?>assets/js/navbar.js"></script>
<script src="<?php echo $base_path; ?>assets/js/carousel.js"></script>
<script src="<?php echo $base_path; ?>assets/js/main.js"></script>
</body>

</html>