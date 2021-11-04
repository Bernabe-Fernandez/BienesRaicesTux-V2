<?php
require 'includes/funciones.php';

//crear mensaje de inserscion correcta a la bd
$resultado = $_GET['resultado'] ?? null;


incluirTemplate('header');
?>


<!-- seccion del catalago -->
<section class="contenedor">
    <div class="catalago-home">
        <h2>
            Casas y Departamentos Destacados
        </h2>
        <div class="catalago-home-container">
            <!-- tarjeta de la casa publicada -->
            <?php
            include 'includes/templates/anunciosrentas.php';
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