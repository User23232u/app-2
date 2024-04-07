<?php
include("conexion.php");
$con = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM persona WHERE id=$id";
    pg_query($con, $sql);
}

pg_close($con);
?>

<div class="container">
    <form method="post" action="eliminar.php">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
</div>