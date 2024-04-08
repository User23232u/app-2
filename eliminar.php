<?php
// Start output buffering
ob_start();

// Incluir el archivo de conexión a la base de datos
include("conexion.php");

// Obtener el ID de la persona desde la URL
$id = $_GET['id'];

// Conectar a la base de datos
$con = conexion();

// Preparar la sentencia SQL para eliminar el registro
$sql = "DELETE FROM persona WHERE idpersona = $1";

// Prepare the statement
$stmt = pg_prepare($con, "delete_query", $sql);

// Execute the statement with the id parameter
$result = pg_execute($con, "delete_query", array($id));

// Verificar si el registro fue eliminado
if ($result) {
    echo "La persona con el ID: $id ha sido eliminada.";
} else {
    echo "Error al eliminar la persona con el ID: $id.";
}

// Cerrar la conexión
pg_close($con);

// Redirigir al usuario a la página principal o a la lista de personas
header("Location: index.php");

// End output buffering and flush the output
ob_end_flush();

exit;
?>
