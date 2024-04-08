<?php
// Start output buffering
ob_start();

// Incluir el archivo de conexión a la base de datos
include("conexion.php");

// Conectar a la base de datos
$con = conexion();

// Preparar la sentencia SQL para insertar el nuevo registro
$sql = "INSERT INTO persona (documento, nombre, apellido, direccion, celular) VALUES ($1, $2, $3, $4, $5)";

// Preparar la sentencia
$result = pg_prepare($con, "insert_persona", $sql);

// Ejecutar la sentencia preparada
$result = pg_execute($con, "insert_persona", array($_POST['documento'], $_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['celular']));

// Verificar si la inserción fue exitosa
if ($result) {
    echo "La persona ha sido registrada.";
} else {
    echo "Error al registrar la persona.";
}

// Cerrar la conexión
pg_close($con);

// Redirigir al usuario a la página principal o a la lista de personas
header("Location: index.php");

// Flush the output buffer
ob_end_flush();

exit;
?>
