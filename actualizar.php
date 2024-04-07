<?php
include("conexion.php");
$con = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $celular = $_POST["celular"];

    $sql = "UPDATE persona SET nombre='$nombre', apellido='$apellido', direccion='$direccion', celular='$celular' WHERE id=$id";
    pg_query($con, $sql);
}

pg_close($con);
?>

<div class="container">
    <form method="post" action="actualizar.php">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
        </div>
        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>