<?php
// Start output buffering
ob_start();

// Establecer la conexión con la base de datos
include("conexion.php");
$con = conexion();

// Preparar la sentencia SQL
$stmtName = 'update_persona';
$sql = 'UPDATE persona SET documento = $1, nombre = $2, apellido = $3, direccion = $4, celular = $5 WHERE idpersona = $6';

// Preparar la sentencia
$result = pg_prepare($con, $stmtName, $sql);

// Verificar si la preparación fue exitosa
if ($result) {
    // Ejecutar la sentencia preparada
    $result = pg_execute($con, $stmtName, array($_POST['documento'], $_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['celular'], $_POST['id']));

    // Verificar si la ejecución fue exitosa
    if ($result) {
        echo "La persona ha sido actualizada.";
    } else {
        echo "Error al actualizar la persona.";
    }
} else {
    echo "Error al preparar la actualización.";
}

// Cerrar la conexión
pg_close($con);

// Redirigir al usuario a la página de verificación o a la lista de personas
header("Location: index.php");

// End output buffering and flush the output
ob_end_flush();

exit;
?>
