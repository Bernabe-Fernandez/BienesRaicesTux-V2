    <?php
    //importar la base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    //consultar
    $query = "SELECT * FROM propiedades LIMIT ${limite}";


    //obtener los resultados
    $resultado = mysqli_query($db, $query);


    while ($propiedad = mysqli_fetch_assoc($resultado)) :
    ?>

        <div class="anuncio">
            <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="propiedad" class="img-anuncio">
            <div class="info-anuncio">
                <h3><?php echo $propiedad['nombrePropiedad']; ?></h3>
                <p class="descripcion">
                    <?php echo $propiedad['descripcion']; ?>
                </p>
                <p class="precio-anuncio">
                    $<?php echo $propiedad['precio']; ?>.00
                </p>
                <p class="title">
                    <span>Tipo Inmueble:</span> <?php echo $propiedad['tipoInmueble']; ?>
                </p>
                <p class="title">
                    <span>Dirección:</span> <?php echo $propiedad['direccion']; ?>
                </p>
                <p class="title">
                    <span>Metros Totales:</span> <?php echo $propiedad['metrosTotales']; ?> mts.
                </p>
                <p class="title">
                    <span>Metros Construidos:</span> <?php echo $propiedad['metrosConstruidos']; ?> mts.
                </p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="img/icono_wc.svg" alt="icono-wc" class="img-caracteristicas">
                        <p><?php echo $propiedad['numBanos']; ?></p>
                    </li>
                    <li>
                        <img src="img/icono_estacionamiento.svg" alt="icono-estacionamiento" class="img-caracteristicas">
                        <p><?php echo $propiedad['numGarajes']; ?></p>
                    </li>
                    <li>
                        <img src="img/icono_dormitorio.svg" alt="icono-dormitorio" class="img-caracteristicas">
                        <p><?php echo $propiedad['numHabitaciones']; ?></p>
                    </li>
                    <li>
                        <img src="img/tiempo-trimestre-pasado.svg" alt="icono-antiguedad" class="img-caracteristicas">
                        <p><?php echo $propiedad['Antiguedad']; ?></p>
                    </li>
                </ul>
            </div>
            <div class="grid">
                <a href="anuncios.php?id=<?php echo $propiedad['IdPropiedad']; ?>" class="btn-azul-block">
                    Más Información
                </a>
                <a href="includes/templates/favorito.php?id=<?php echo $propiedad['IdPropiedad']; ?>&ocupacion=<?php echo $propiedad['ocupacion']; ?>">
                    <img src="img/corazon.svg" alt="icono-antiguedad" class="icono-favoritos">
                </a>
            </div>
        </div>
    <?php
    endwhile;
    //cerrar la conexion
    mysqli_close($db);

    ?>