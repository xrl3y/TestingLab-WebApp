<?php

if (!empty($_POST["btnregistrar"])) {
    // Verificar que todos los campos requeridos están llenos
    if (!empty($_POST["Nit"]) && !empty($_POST["Nombres"]) && !empty($_POST["Apellidos"]) && !empty($_POST["Correo"]) && !empty($_POST["Contraseña"]) && !empty($_POST["idEstadoCivil"]) && !empty($_POST["idMembresia"])) {
        
        include "../Php/conectividad.php";

        // Recibir datos del formulario
        $nit = $_POST["Nit"];
        $id = $_POST["id"];
        $nombre = $_POST["Nombres"];
        $apellidos = $_POST["Apellidos"];
        $correo = $_POST["Correo"];
        $contraseña = $_POST["Contraseña"];
        $idEstadoCivil = $_POST["idEstadoCivil"];
        $idMembresia = $_POST["idMembresia"];

        // Consulta de actualización
        $sql = $conexion->query("UPDATE datospersonales SET 
            Nit='$nit', 
            Nombres='$nombre', 
            Apellidos='$apellidos', 
            Correo='$correo', 
            Contraseña='$contraseña', 
            IdEstadoCivil='$idEstadoCivil', 
            IdMembresia='$idMembresia' 
            WHERE Nit='$id'");

        // Redireccionar o mostrar error según el resultado
        if ($sql) {
            echo "<script>alert('Datos modificados correctamente'); window.location='../crud.php';</script>";
        } else {
            echo "<div class='alert alert-danger'>Error al modificar los datos: " . $conexion->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Todos los campos son obligatorios</div>";
    }
} else {
    echo "<div class='alert alert-warning'>No se envió el formulario correctamente</div>";
}
?>
