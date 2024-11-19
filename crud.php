<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['correo'];
if ($varsesion== null || $varsesion= ''){
    header("location:../ProyectoFinal2/index.html");
    die();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Disponibles - EducaOnline</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="icon" type="image/x-icon" href="https://logodix.com/logo/1707088.png">
</head>
<body>
    <header>
        <?php
        include "Php/conectividad.php";
        include "controlador/eliminarUsuarios.php";
        ?>
        <div class="header-container">
            <nav>
                <ul>
                    <li>
                        <a href="#" class="logo">
                            <img src="Imagenes/cc649ed0-1ced-4788-aa96-0be1084cc928.jpg" alt="">
                            <span class="nav-item">Code Info</span>
                        </a>
                    </li>
                    <li><a href="#"><i class="fas fa-home"></i><span class="nav-item">Home</span></a></li>
                    <li><a href="cerrar_sesion.php" class="logout"><i class="fas fa-sign-out-alt"></i><span class="nav-item">Salir</span></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="row d-flex justify-content-center">
        <!-- Contenedor de mensajes -->
        <div class="message-container">
            <?php if(isset($_SESSION['message'])) { ?>
                <div class="message <?=$_SESSION['message_type']?>">
                    <?= $_SESSION['message'] ?>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php } ?>
        </div>

        <?php
        // Definir cuántos resultados quieres mostrar por página
        $resultados_por_pagina = 8;

        // Determinar en qué página se encuentra el usuario
        if (isset($_GET['pagina'])) {
            $pagina_actual = $_GET['pagina'];
        } else {
            $pagina_actual = 1;
        }

        // Determinar el inicio de los resultados en la consulta SQL
        $inicio = ($pagina_actual - 1) * $resultados_por_pagina;

        // Consulta para obtener el número total de filas en la tabla
        $sql_total = $conexion->query("SELECT COUNT(*) as total FROM datospersonales");
        $filas_totales = $sql_total->fetch_object()->total;

        // Determinar cuántas páginas se necesitan
        $total_paginas = ceil($filas_totales / $resultados_por_pagina);

        // Consulta SQL para obtener los resultados de la página actual
        $sql = $conexion->query("SELECT Nit, Nombres, Apellidos, Contraseña, Correo, TipoMebresia, estadocivil
                                 FROM `datospersonales`
                                 INNER JOIN membresia ON datospersonales.IdMembresia = membresia.IdMembresia
                                 INNER JOIN estadocivil ON datospersonales.IdEstadoCivil = estadocivil.id
                                 LIMIT $inicio, $resultados_por_pagina");
        ?>
        <div class="table-header">
            <a href="Paginas/editar.html" class="btn-primary" >Crear</a>
        </div>
        <div class="table-container">
        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Correos</th>
                        <th scope="col">Membresia</th>
                        <th scope="col">Estado civil</th>
                        <th scope="col">CRUD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?=$datos->Nit?></td>
                            <td><?=$datos->Nombres?></td>
                            <td><?=$datos->Apellidos?></td>
                            <td><?=$datos->Correo?></td>
                            <td><?=$datos->TipoMebresia?></td>
                            <td><?=$datos->estadocivil?></td>
                            <td>
                                <a href="modificarUsuario.php?id=<?=$datos->Nit?>"><img src="https://cdn.icon-icons.com/icons2/1141/PNG/512/1486395883-edit_80608.png" alt="Icono 1" width="30px"></a>
                                <a href="crud.php?id=<?=$datos->Nit?>" class="btn btn-small btn-danger"><img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" alt="Icono 2" width="30px"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="pagination">
            <?php if ($pagina_actual > 1): ?>
            <a href="crud.php?pagina=<?= $pagina_actual - 1 ?>">Anterior</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <a href="crud.php?pagina=<?= $i ?>" <?= ($i == $pagina_actual) ? 'class="active"' : '' ?>><?= $i ?></a>
            <?php endfor; ?>
            <?php if ($pagina_actual < $total_paginas): ?>
            <a href="crud.php?pagina=<?= $pagina_actual + 1 ?>">Siguiente</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
