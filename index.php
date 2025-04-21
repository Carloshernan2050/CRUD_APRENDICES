<?php
require_once 'controller/aprendiz/aprendizController.php';

// Llamar al controlador
$controlador = new aprendizController();

// Manejo de las acciones
if (isset($_GET['action']) && $_GET['action'] === 'guardar_aprendiz') {
    $controlador->guardarAprendiz();
} else {
    // Mostrar la lista de aprendices (por ejemplo, ver aprendices)
    $aprendices = $controlador->verAprendices();
}
?>

<!-- Incluir el archivo head.php -->
<?php require_once 'head.php'; ?>

<body>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Lista de Aprendices</h1>
                <div class="text-center mb-3">
                    <a href="view/crear_aprendiz.php" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-plus"></i> Crear Aprendiz
                    </a>
                    <a href='view/ver_programas.php?id={$id}' class='btn btn-info btn-sm'><i class='fa-solid fa-eye'></i> Ver programas</a>
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
                        // Verificar si hay aprendices
                        if (!empty($aprendices) && is_array($aprendices)) {
                            $contador = 1;
                            foreach ($aprendices as $row) {
                                $id = htmlspecialchars($row['id']);
                                $nombre = htmlspecialchars($row['primer_nombre']);
                                $fecha_nac = new DateTime($row['fecha_nac']);
                                $edad = (new DateTime())->diff($fecha_nac)->y;

                                echo "<tr class='text-center'>";
                                echo "<th scope='row'>{$contador}</th>";
                                echo "<td>{$nombre}</td>";
                                echo "<td>{$edad} años</td>";
                                echo "<td><a href='view/ver_aprendices.php?id={$id}' class='btn btn-info btn-sm'><i class='fa-solid fa-eye'></i> Ver</a></td>";
                                echo "<td><a href='view/modificar_aprendiz.php?id={$id}' class='btn btn-warning btn-sm'><i class='fa-solid fa-pencil'></i> Editar</a></td>";
                                echo "<td><a href='view/eliminar_aprendiz.php?id={$id}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este aprendiz?\")'><i class='fa-solid fa-circle-xmark'></i> Eliminar</a></td>";

                                echo "</tr>";
                                $contador++;
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No hay aprendices disponibles.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Incluir scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
