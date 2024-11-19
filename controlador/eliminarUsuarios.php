<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    // Validación adicional
    if (!empty($_GET["confirm"]) && $_GET["confirm"] === 'yes') {
        // Si hay confirmación, proceder con la eliminación
        $sql = $conexion->query("DELETE FROM datospersonales WHERE nit=$id");
        if ($sql == 1) {
            echo '<div class="message success">Persona eliminada correctamente</div>';
        } else {
            echo '<div class="message error">Error al eliminar la persona</div>';
        }
    } else {
        // Si no hay confirmación, muestra un mensaje y un enlace para confirmar
        echo "<div class='message-container'>
                <div class='message warning centered-message'>
                    ¿Estás seguro de que deseas eliminar este registro?
                    <a href='crud.php?id=$id&confirm=yes' class='confirm-link'>Sí, eliminar</a>
                    <a href='crud.php' class='cancel-link'>Cancelar</a>
                </div>
              </div>";
    }
}
?>
