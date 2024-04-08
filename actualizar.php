<?php
// Incluir el archivo de conexión a la base de datos
include("conexion.php");

// Obtener el ID de la persona y los nuevos datos desde el formulario
$id = $_POST['id'];
$newName = $_POST['newName'];
$newAddress = $_POST['newAddress'];

// Conectar a la base de datos
$con = conexion();

// Preparar la sentencia SQL para actualizar el registro
$sql = "UPDATE persona SET nombre = $1, direccion = $2 WHERE idpersona = $3";

// Prepare the statement
$stmt = pg_prepare($con, "update_query", $sql);

// Execute the statement with the new data and id parameters
$result = pg_execute($con, "update_query", array($newName, $newAddress, $id));

// Verificar si el registro fue actualizado
if ($result) {
    echo "La persona con el ID: $id ha sido actualizada.";
} else {
    echo "Error al actualizar la persona con el ID: $id.";
}

// Cerrar la conexión
pg_close($con);

// Redirigir al usuario a la página principal o a la lista de personas
header("Location: index.php");
exit;
?>
