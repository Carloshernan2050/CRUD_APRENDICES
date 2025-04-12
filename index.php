<?php
require_once 'controller/aprendizController.php';


$controlador = new aprendizController();
$aprendices = $controlador->index();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SENA || Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Lista de Aprendices</h1>
                <div class="text-center mb-3">
                    <a href="crear.php" class="btn btn-sm btn-primary">Crear Aprendiz</a>
                </div>

                <table class="table table-sm table-hover table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Edad</th>
                            <th colspan="3" scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 1;
                        foreach ($aprendices as $row) {
                            $id = $row['id'];
                            $nombre = $row['primer_nombre'];
                            $fecha_nac = new DateTime($row['fecha_nac']);
                            $edad = (new DateTime())->diff($fecha_nac)->y;

                            echo "<tr class='text-center'>";
                            echo "<th scope='row'>{$contador}</th>";
                            echo "<td>{$nombre}</td>";
                            echo "<td>{$edad} años</td>";
                            echo "<td><a href='ver.php?id={$id}' class='btn btn-info btn-sm'>Ver</a></td>";
                            echo "<td><a href='editar.php?id={$id}' class='btn btn-warning btn-sm'>Editar</a></td>";
                            echo "<td><a href='delete.php?id={$id}' class='btn btn-danger btn-sm'>Eliminar</a></td>";
                            echo "</tr>";
                            $contador++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
