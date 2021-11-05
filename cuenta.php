<?php
require 'includes/funciones.php';
/*$auth = estaAutenticado();
    if (!$auth) {
        header('Location: index.php?resultado=4');
    }*/

//Conexion a la base de datos
require 'includes/config/database.php';

//conexion a la base de datos
$db = conectarDB();

//arreglo con mensaje de errores
$errores = [];


//echo $degrom == $_POST['option'];
//exit;

$idcompradores = "";
$Nombres = "";
$apellidoPaterno = "";
$apellidoMaterno = "";
$correoElectronico = "";
$contraseña = "";
$numeroTelefonico = "";
$telefonoMovil = "";
$RFC = "";
$codigoPostal = "";
$nameUser = "";
$direccion = "";




//ejecutar el codigo despues de que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["option"] == '1') {
    $nameUser = $_POST['nameuser'];
    $Nombres = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidopaterno'];
    $apellidoMaterno = $_POST['apellidomaterno'];
    $correoElectronico = $_POST['correoelectronico'];
    $contraseña = $_POST['Contraseña'];
    $numeroTelefonico = $_POST['numerotelefonico'];
    $codigoPostal = $_POST['codigopostal'];

    if (!$Nombres) {
        $errores[] = 'Debes añadir un Nombre';
    }
    if (!$apellidoPaterno) {
        $errores[] = 'Debes añadir apellido paterno';
    }
    if (!$apellidoMaterno) {
        $errores[] = 'Debes añadir apellido materno';
    }
    if (!$correoElectronico) {
        $errores[] = 'Debes añadir el correo electronico';
    }
    if (!$contraseña) {
        $errores[] = 'Debes añadir una contraseña';
    }
    if (!$numeroTelefonico) {
        $errores[] = 'Debes añadir un numero telefonico';
    }
    if (!$codigoPostal) {
        $errores[] = 'Debes añadir el codigo postal';
    }
    if (!$nameUser) {
        $errores[] = 'Debes añadir el nombre de usuario';
    }

    //hashear password
    $passwordHash = password_hash($contraseña, PASSWORD_BCRYPT);

    //Revisar que el arreglo de errores este vacio
    if (empty($errores)) {

        //insertar en la BD
        $query = "INSERT INTO compradores (nameUser, Nombres, apellidoPaterno, apellidoMaterno, correoElectronico, contraseña, numeroTelefonico, codigoPostal) VALUES ('$nameUser','$Nombres' , '$apellidoPaterno' , '$apellidoMaterno' , '$correoElectronico' , '$passwordHash' , '$numeroTelefonico' , '$codigoPostal')";

        $resultado = mysqli_query($db, $query);


        if ($resultado) {
            //REDICCIONAR AL USUARIO
            header('Location: login.php?resultado=1');
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["option"] == '2') {
    $nameUser = $_POST['nameuser'];
    $Nombres = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidopaterno'];
    $apellidoMaterno = $_POST['apellidomaterno'];
    $correoElectronico = $_POST['correoelectronico'];
    $contraseña = $_POST['Contraseña'];
    $numeroTelefonico = $_POST['numerotelefonico'];
    $codigoPostal = $_POST['codigopostal'];
    $RFC = $_POST['RFC'];
    $telefonoMovil = $_POST['telefonomovil'];
    $direccion = $_POST['Direccion'];

    if (!$Nombres) {
        $errores[] = 'Debes añadir un Nombre';
    }
    if (!$apellidoPaterno) {
        $errores[] = 'Debes añadir apellido paterno';
    }
    if (!$apellidoMaterno) {
        $errores[] = 'Debes añadir apellido materno';
    }
    if (!$correoElectronico) {
        $errores[] = 'Debes añadir el correo electronico';
    }
    if (!$contraseña) {
        $errores[] = 'Debes añadir una contraseña';
    }
    if (!$numeroTelefonico) {
        $errores[] = 'Debes añadir un numero telefonico';
    }
    if (!$codigoPostal) {
        $errores[] = 'Debes añadir el codigo postal';
    }
    if (!$nameUser) {
        $errores[] = 'Debes añadir el nombre de usuario';
    }
    if (!$RFC) {
        $errores[] = 'Debes añadir tu RFC';
    }
    if (!$direccion) {
        $errores[] = 'Debes añadir la direccion';
    }
    //hashear password
    $passwordHash = password_hash($contraseña, PASSWORD_BCRYPT);


    //Revisar que el arreglo de errores este vacio
    if (empty($errores)) {


        //insertar en la BD
        $query = "INSERT INTO vendedores(nameUser, Nombre, apellidoPaterno, apellidoMaterno, correoElectronico, contraseña, numeroTelefonico, telefonoMovil, RFC, codigoPostal, direccion) VALUES ('$nameUser','$Nombres' , '$apellidoPaterno' , '$apellidoMaterno' , '$correoElectronico' , '$passwordHash' , '$numeroTelefonico' ,'$telefonoMovil','$RFC', '$codigoPostal','$direccion')";

        $resultado = mysqli_query($db, $query);


        if ($resultado) {
            //REDICCIONAR AL USUARIO
            header('Location: login.php?resultado=1');
        }
    }
}


incluirTemplate('header');
?>


<!-- contactanos -->
<main class="contenedor contacto">
    <h1>Registro</h1>
    <h2>Llene el formulario de registro</h2>
    <a href="index.php" class="boton-azul">Regresar</a>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <!-- formulario de contacto -->
    <form method="POST" class="formulario" action="cuenta.php">
        <!-- informacion personal -->
        <fieldset>
            <legend>Información Personal</legend>
            <label for="ocupacion">comprador o vendedor</label>
            <select id="ocupacion" name="option" onChange="tipochange(this)">
                <option value disabled selected>--- Seleccione ---</option>

                <option value="1" id="uno" onclick="mostrar();">Comprador</option>

                <option value="2" id="dos">Vendedor</option>

            </select>
            <label for="nombre">Nombre De Usuario</label>
            <input id="nombre" name="nameuser" type="text" placeholder="Ej. Juan19" required value="<?php echo $nameUser; ?>">

            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" placeholder="Tu Nombre" required value="<?php echo $Nombres; ?>">

            <label for="apellidoPaterno">apellido paterno</label>
            <input id="apellidoPaterno" name="apellidopaterno" type="text" placeholder="Tu apellido paterno" required value="<?php echo $apellidoPaterno; ?>">

            <label for="<apellido>materno</apellido>materno">apellido materno</label>
            <input id="apellidoMaterno" name="apellidomaterno" type="text" placeholder="Tu apellido materno" required value="<?php echo $apellidoMaterno; ?>">

            <label for="correo">E-mail</label>
            <input id="correo" name="correoelectronico" type="email" placeholder="Tu Correo Electronico" required value="<?php echo $correoElectronico; ?>">

            <!-- password -->
            <label for="password">contraseña</label>
            <div class="contenedor-password">
                <input id="password" name="Contraseña" type="password" name="passwrod" placeholder="Tu Contraseña" required value="<?php echo $contraseña; ?>">
                <div class="icono-password toggle" onclick="mostrar()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="2" />
                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                    </svg>
                </div>
            </div>


            <label for="telefono">telefono</label>
            <input id="numerotelefonico" name="numerotelefonico" type="tel" placeholder="tu telefono" required value="<?php echo $numeroTelefonico; ?>">

            <label for="codigopostal">codigo postal</label>
            <input id="codigopostal" name="codigopostal" type="number" placeholder="Tu codigo postal" required value="<?php echo $codigoPostal; ?>">

            <!-- vendedor -->
            <label for="RFC" id="RFClabel">RFC</label>
            <input id="RFCvent" name="RFC" type="text" placeholder="Tu RFC" value="<?php echo $RFC; ?>">

            <label for="celular" id="celebal">cel</label>
            <input id="celvent" name="telefonomovil" type="number" placeholder="Tu celular" value="<?php echo $telefonoMovil; ?>">

            <label for="direccion" id="direccionlebal">direccion</label>
            <input id="direccionvent" name="Direccion" type="text" placeholder="tu direccion" value="<?php echo $direccion; ?>">
            <!-- fin de vendedores -->

        </fieldset>
        <!-- botton amarillo -->
        <div class="boton-amarillo-rigth">
            <input type="submit" value="Enviar" class="boton-amarillo">
        </div>
    </form>
</main>
<!-- footer -->
<footer>
    <p>Bienes<span>Raices</span>Tux Todos los Derechos Reservados &copy;</p>
</footer>

<!-- mandamos a llamar js -->
<script src=" js/script.js"></script>
</body>

</html>