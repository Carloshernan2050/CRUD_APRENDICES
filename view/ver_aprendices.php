<?php
// Incluir los modelos
require_once 'D:/laragon/www/CRUD_APRENDICES/model/aprendiz/aprendiz.php';
require_once 'D:/laragon/www/CRUD_APRENDICES/model/programa/programa.php';

// Conexión
$conexion = new Conexion();
$pdo = $conexion->conectar();

// Obtener aprendices con id_programa
$sql = "SELECT id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, fecha_nac, id_grupo_sanguineo, id_tipo_documento, numero_documento, direccion, id_programa FROM personas";
$stmt = $pdo->query($sql);
$aprendices = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener programas
$programaModel = new ProgramaModel();
$programas = $programaModel->obtenerProgramas();
$mapaProgramas = [];
foreach ($programas as $programa) {
    $mapaProgramas[$programa['id']] = $programa['nombre'];
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SENA || Ver Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <h1>Ver Aprendices</h1>
    <hr>
    <h2>Lista de Aprendices</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Primer Nombre</td>
                <td>Segundo Nombre</td>
                <td>Primer Apellido</td>
                <td>Segundo Apellido</td>
                <td>Sexo</td>
                <td>Fecha de Nacimiento</td>
                <td>Edad</td>
                <td>Grupo Sanguíneo</td>
                <td>Tipo de Documento</td>
                <td>Número de Documento</td>
                <td>Dirección</td>
                <td>Programa</td> <!-- NUEVO -->
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aprendices as $aprendiz): ?>
                <tr>
                    <td><?= htmlspecialchars($aprendiz['id']) ?></td>
                    <td><?= htmlspecialchars($aprendiz['primer_nombre']) ?></td>
                    <td><?= htmlspecialchars($aprendiz['segundo_nombre']) ?></td>
                    <td><?= htmlspecialchars($aprendiz['primer_apellido']) ?></td>
                    <td><?= htmlspecialchars($aprendiz['segundo_apellido']) ?></td>
                    <td>
                        <?php
                        $sexos = [1 => 'Masculino', 2 => 'Femenino', 3 => 'No registra'];
                        echo $sexos[$aprendiz['sexo']] ?? 'Desconocido';
                        ?>
                    </td>
                    <td><?= (new DateTime($aprendiz['fecha_nac']))->format('Y-m-d') ?></td>
                    <td>
                        <?php
                        $edad = (new DateTime())->diff(new DateTime($aprendiz['fecha_nac']));
                        echo $edad->y;
                        ?>
                    </td>
                    <td>
                        <?php
                        $gruposSanguineos = [
                            1 => 'A+', 2 => 'B+', 3 => 'AB+', 4 => 'O+', 
                            5 => 'A-', 6 => 'B-', 7 => 'AB-', 8 => 'O-'
                        ];
                        echo $gruposSanguineos[$aprendiz['id_grupo_sanguineo']] ?? 'Desconocido';
                        ?>
                    </td>
                    <td>
                        <?php
                        $tiposDocumento = [
                            1 => 'Cédula de Ciudadanía (CC)',
                            2 => 'Tarjeta de Identidad (TI)',
                            3 => 'Cédula de Extranjería (CE)'
                        ];
                        echo $tiposDocumento[$aprendiz['id_tipo_documento']] ?? 'Desconocido';
                        ?>
                    </td>
                    <td><?= htmlspecialchars($aprendiz['numero_documento']) ?></td>
                    <td><?= htmlspecialchars($aprendiz['direccion']) ?></td>

                    <!-- Programa -->
                    <td>
                        <?= $mapaProgramas[$aprendiz['id_programa']] ?? 'Sin asignar' ?>
                    </td>

                    <td>
                        <a href="modificar_aprendiz.php?id=<?= $aprendiz['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pencil"></i> Editar
                        </a>
                        <a href="eliminar_aprendiz.php?id=<?= $aprendiz['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este aprendiz?');">
                            <i class="fa-solid fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="../index.php" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Volver
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
