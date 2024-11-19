<?php
include "php/conectividad.php";
$id = $_GET["id"];
$sql = $conexion->query("SELECT Nit, Nombres, Apellidos, Correo, Contraseña, IdEstadoCivil, IdMembresia FROM datospersonales WHERE Nit = '$id'");
$datos = $sql->fetch_object();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form method="POST" action="controlador/modificar_producto.php">
        <h5 class="form-title">Modificar Persona</h5>

        <input type="hidden" name="id" value="<?= $datos->Nit ?>">

        <div class="form-group">
            <label for="Nit">Nit</label>
            <input type="text" class="form-control" name="Nit" value="<?= $datos->Nit ?>" required>
        </div>
        <div class="form-group">
            <label for="Nombres">Nombres</label>
            <input type="text" class="form-control" name="Nombres" value="<?= $datos->Nombres ?>" required>
        </div>
        <div class="form-group">
            <label for="Apellidos">Apellidos</label>
            <input type="text" class="form-control" name="Apellidos" value="<?= $datos->Apellidos ?>" required>
        </div>
        <div class="form-group">
            <label for="Correo">Correo</label>
            <input type="email" class="form-control" name="Correo" value="<?= $datos->Correo ?>" required>
        </div>
        <div class="form-group">
            <label for="Contraseña">Contraseña</label>
            <input type="password" class="form-control" name="Contraseña" value="<?= $datos->Contraseña ?>" required>
        </div>
        <div class="form-group">
            <label for="idEstadoCivil">Estado Civil</label>
            <select class="form-control" name="idEstadoCivil" required>
                <option value="1" <?= $datos->IdEstadoCivil == 1 ? 'selected' : '' ?>>Soltero</option>
                <option value="2" <?= $datos->IdEstadoCivil == 2 ? 'selected' : '' ?>>Casado</option>
                <option value="3" <?= $datos->IdEstadoCivil == 3 ? 'selected' : '' ?>>Divorciado</option>
                <option value="4" <?= $datos->IdEstadoCivil == 4 ? 'selected' : '' ?>>Viudo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="idMembresia">Membresía</label>
            <select class="form-control" name="idMembresia" required>
                <option value="1" <?= $datos->IdMembresia == 1 ? 'selected' : '' ?>>Personal</option>
                <option value="2" <?= $datos->IdMembresia == 2 ? 'selected' : '' ?>>Administrador</option>
            </select>
        </div>
        <button type="submit" name="btnregistrar" class="btn btn-primary btn-block" value="ok">Guardar Cambios</button>

    </form>

    </div>
</body>
</html>
