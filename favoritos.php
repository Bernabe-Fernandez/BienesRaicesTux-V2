<?php
require 'includes/funciones.php';
$user = estaAutenticado();
if (!$user) {
    header('Location: index.php?resultado=4');
}

$resultado = $_GET['resultado'] ?? null;


incluirTemplate('header');
?>

<!-- sobre-nosotros -->
<!-- seccion del catalago -->
<section class="contenedor">
    <div class="catalago-home">
        <?php if (intval($resultado) === 1) : ?>
            <p class="alerta error">Se Elimino de Favoritos</p>
        <?php endif; ?>
        <h2>
            Favoritos
        </h2>
        <div class="catalago-home-container">
            <!-- tarjeta de la casa publicada -->
            <?php
            $idUser = $_SESSION['Idusuario'];
            include 'includes/templates/anunciofav.php';
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