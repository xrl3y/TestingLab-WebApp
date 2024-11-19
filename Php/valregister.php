<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eduvirtual";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nit = $_POST['nit'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$idEstadoCivil = $_POST['idEstadoCivil'];

// Encriptar la contraseña
$hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

// Insertar datos en la base de datos
$sql = "INSERT INTO datospersonales (nit, nombres, apellidos, correo, contraseña , idEstadoCivil)
        VALUES ('$nit', '$nombres', '$apellidos', '$correo', '$hashed_password', '$idEstadoCivil')";

if ($conn->query($sql) === TRUE) {
    header("location:../Paginas/pagos.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
