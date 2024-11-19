<?php
// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "db_eduvirtual");
$conexion->set_charset("utf8");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
