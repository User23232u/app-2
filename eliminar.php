<?php
// Incluir el archivo de conexión a la base de datos
include("conexion.php");

// Obtener el ID de la persona desde la URL
$id = $_GET['id'];

// Conectar a la base de datos
$con = conexion();

// Preparar la sentencia SQL para eliminar el registro
$sql = "DELETE FROM persona WHERE idpersona = $id";
$result = pg_query($con, $sql);

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
exit;
?>
