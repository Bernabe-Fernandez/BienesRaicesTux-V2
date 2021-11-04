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

$query = "INSERT INTO favoritos (idUsuario, idProducto) VALUES ('$idUsuario', '$idProducto')";
$resultado = mysqli_query($db, $query);

if ($resultado) {
    //REDICCIONAR AL USUARIO
    header('Location: ../../favoritos.php');
}
