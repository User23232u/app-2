<!DOCTYPE html>
<html lang="es">

<head>
 <title>Pagina Principal</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico" />

 <!-- Bootstrap core CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

 <!-- Estilos personalizados -->
 <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 960px;
      margin: 0 auto;
    }
    table {
      width: 100%;
      margin-top: 20px;
    }
    table th, table td {
      padding: 10px;
      border-bottom: 1px solid #dee2e6;
    }
    .btn {
      margin-right: 5px;
    }
 </style>
</head>

<body>

 <div class="container mt-5">
    <h1 class="text-center">Lista de Personas</h1>
    <?php
    include("conexion.php");
    $con = conexion();

    $sql = "SELECT * FROM persona";
    $result = pg_query($con, $sql);

    if (pg_num_rows($result) > 0) {
      echo "<table class='table'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>Documento</th>";
      echo "<th>Nombre</th>";
      echo "<th>Apellido</th>";
      echo "<th>Dirección</th>";
      echo "<th>Celular</th>";
      echo "<th>Acciones</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["idpersona"] . "</td>";
        echo "<td>" . $row["documento"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["apellido"] . "</td>";
        echo "<td>" . $row["direccion"] . "</td>";
        echo "<td>" . $row["celular"] . "</td>";
        echo "<td>";
        echo "<a href='ver.php?id=" . $row["idpersona"] . "' class='btn btn-primary'>Ver</a> ";
        echo "<a href='editar.php?id=" . $row["idpersona"] . "' class='btn btn-warning'>Editar</a> ";
        echo "<a href='eliminar.php?id=" . $row["idpersona"] . "' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este registro?\")'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
    } else {
      echo "<div class='text-center'>No se encontraron resultados</div>";
    }

    pg_close($con);
    ?>
    <!-- Botón para agregar registros -->
    <div class="text-center mt-3">
        <a href="registrar.php" class="btn btn-success">Agregar Persona</a>
    </div>
 </div>

 <!-- Placed at the end of the document so the pages load faster -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
