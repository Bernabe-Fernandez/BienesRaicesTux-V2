<?php
require 'includes/funciones.php';
$admin = estaAutenticado();
if (!$admin) {
    header('Location: index.php?resultado=4');
}
incluirTemplate('header');
?>

<!-- sobre-nosotros -->
<!-- seccion del catalago -->
<section class="contenedor">
    <div class="catalago-home">
        <h2>
            Favoritos
        </h2>
        <div class="catalago-home-container">

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