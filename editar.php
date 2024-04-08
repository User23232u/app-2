<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Persona</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous">
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }

        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
            echo "<h2>Editar Persona</h2>";
            echo "<form action='actualizar.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row["idpersona"] . "'>";
            echo "<label for='documento'>Documento:</label>";
            echo "<input type='text' id='documento' name='documento' value='" . $row["documento"] . "'>";
            echo "<label for='nombre'>Nombre:</label>";
            echo "<input type='text' id='nombre' name='nombre' value='" . $row["nombre"] . "'>";
            echo "<label for='apellido'>Apellido:</label>";
            echo "<input type='text' id='apellido' name='apellido' value='" . $row["apellido"] . "'>";
            echo "<label for='direccion'>Dirección:</label>";
            echo "<input type='text' id='direccion' name='direccion' value='" . $row["direccion"] . "'>";
            echo "<label for='celular'>Celular:</label>";
            echo "<input type='text' id='celular' name='celular' value='" . $row["celular"] . "'>";
            echo "<input type='submit' value='Actualizar'>";
            echo "</form>";
        } else {
            echo "No se encontró la persona con el ID: $id";
        }
        pg_close($con);
        ?>
    </div>
</body>

</html>
