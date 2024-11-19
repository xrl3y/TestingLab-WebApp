<?php
session_start();

if (isset($_POST['correo']) && isset($_POST['contraseña'])) {
    $user = $_POST['correo'];
    $password = $_POST['contraseña'];

    $_SESSION['correo'] = $user;

    $conexion = mysqli_connect("localhost", "root", "", "db_eduvirtual");

    if (!$conexion) {
        echo "<script>alert('Conexión fallida');</script>";
        exit();
    }

    $consulta = "SELECT * FROM datospersonales WHERE correo='$user'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $filas = mysqli_num_rows($resultado);

        if ($filas > 0) {
            $row = mysqli_fetch_assoc($resultado);

            if (isset($row['Contraseña'])) {
                $hashed_password = $row['Contraseña'];

                // Verificar la contraseña
                if (password_verify($password, $hashed_password)) {
                    // Verificar el perfil del usuario y redirigir en consecuencia
                    $perfil = $row['IdMembresia']; // Asumiendo que 'perfil' es el campo que contiene el perfil del usuario

                    if ($perfil == 2) {
                        echo "<script>
                                alert('Bienvenido, redirigiendo a crud.php');
                                window.location.href = '../crud.php';
                              </script>";
                    } elseif ($perfil == 1) {
                        echo "<script>
                                alert('Bienvenido, redirigiendo a Cursos.php');
                                window.location.href = '../Paginas/Cursos.php';
                              </script>";
                    }
                    exit(); // Asegurarse de que el script se detenga después de la redirección
                } else {
                    echo "<script>
                            alert('ERROR EN LA AUTENTIFICACION');
                            window.location.href = '../Paginas/login.html';
                          </script>";
                }
            } else {
                echo "<script>alert('La contraseña no se encontró en la base de datos');</script>";
            }
        } else {
            echo "<script>
                    alert('ERROR EN LA AUTENTIFICACION');
                    window.location.href = '../Paginas/login.html';
                  </script>";
        }
    } else {
        echo "<script>alert('Error en la consulta');</script>";
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
} else {
    echo "<script>alert('Faltan campos por llenar');</script>";
}
?>
