<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ver Persona</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico" />

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #ffffff; /* Fondo blanco */
            font-family: Arial, sans-serif;
            margin: 0; /* Elimina el margen predeterminado del body */
            padding: 20px; /* Añade un poco de padding para el contenido */
        }

        h2 {
            color: #333;
            margin-bottom: 20px; /* Espacio entre el título y el contenido */
        }

        p {
            color: #333; /* Color de texto oscuro */
            margin-bottom: 10px; /* Espacio entre los párrafos */
        }

        .container {
            max-width: 600px; /* Limita el ancho del contenedor */
            margin: 0 auto; /* Centra el contenedor */
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include("conexion.php");
        $con = conexion();
        $id = $_GET['id'];
        $sql = "SELECT * FROM persona WHERE idpersona = $id";
        $result = pg_query($con, $sql);
        if (pg_num_rows($result) > 0) {
            $row = pg_fetch_assoc($result);
            echo "<h2>Detalles de la Persona</h2>";
            echo "<p>ID: " . $row["idpersona"] . "</p>";
            echo "<p>Documento: " . $row["documento"] . "</p>";
            echo "<p>Nombre: " . $row["nombre"] . "</p>";
            echo "<p>Apellido: " . $row["apellido"] . "</p>";
            echo "<p>Dirección: " . $row["direccion"] . "</p>";
            echo "<p>Celular: " . $row["celular"] . "</p>";
        } else {
            echo "No se encontró la persona con el ID: $id";
        }
        pg_close($con);
        ?>
    </div>
</body>

</html>
