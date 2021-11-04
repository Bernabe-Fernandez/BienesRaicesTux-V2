<?php
require '../../includes/funciones.php';
$user = estaAutenticado();
if (!$user) {
    header('Location: index.php?resultado=4');
}

//Conexion a la base de datos
require '../../includes/config/database.php';

//conexion a la base de datos
$db = conectarDB();

$idProducto = $_GET['id'];
$idUsuario = $_SESSION['Idusuario'];

$query = "DELETE FROM favoritos WHERE IdFavoritos = ${idProducto}";
$resultado = mysqli_query($db, $query);

if ($resultado) {
    //REDICCIONAR AL USUARIO
    header('Location: ../../favoritos.php?resultado=1');
}
