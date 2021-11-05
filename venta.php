<?php
require 'includes/funciones.php';

//crear mensaje de inserscion correcta a la bd
$resultado = $_GET['resultado'] ?? null;


incluirTemplate('header');
?>

<!-- sobre-nosotros -->

<!-- seccion del catalago -->
<section class="contenedor">
    <div class="catalago-home">
        <h2>
            Casas y Departamentos en Venta
        </h2>
        <div class="catalago-container">
            <!-- tarjeta de la casa publicada -->
            <?php
            include 'includes/templates/anunciosventas.php';
            //inclui el archivo de anucniosventas.php para que me muestre el filtro de ventas
            ?>
        </div>
    </div>
</section>
<!-- footer -->
<footer>
    <p>Bienes<span>Raices</span>Tux Todos los Derechos Reservados &copy;</p>
</footer>

<!-- mandamos a llmar js -->
<script src=" js/script.js"></script>
</body>

</html>