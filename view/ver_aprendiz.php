<?php
include 'D:/laragon/www/CRUD_APRENDICES/head.php'; 
// Incluir el archivo de la clase Conexion
require_once 'D:/laragon/www/CRUD_APRENDICES/model/aprendiz/aprendiz.php';

// Crear una instancia de la clase Conexion
$conexion = new Conexion();

// Obtener la conexión
$pdo = $conexion->conectar();

// Obtener los aprendices desde la base de datos
$sql = "SELECT id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, fecha_nac, grupo_sanguineo, tipo_documento, numero_documento, direccion FROM personas";
$stmt = $pdo->query($sql);
$aprendices = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SENA || Ver Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1>Ver Aprendices</h1>
                    <hr>
                    <h2>Lista de Aprendices</h2>
                    <!-- Tabla para mostrar los aprendices -->
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
                                <td>Grupo Sanguíneo</td>
                                <td>Tipo de Documento</td>
                                <td>Número de Documento</td>
                                <td>Dirección</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aprendices as $aprendiz): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($aprendiz['id']); ?></td>
                                    <td><?php echo htmlspecialchars($aprendiz['primer_nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($aprendiz['segundo_nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($aprendiz['primer_apellido']); ?></td>
                                    <td><?php echo htmlspecialchars($aprendiz['segundo_apellido']); ?></td>
                                    <td><?php echo htmlspecialchars($aprendiz['sexo']); ?></td>
                                    <td><?php echo (new DateTime($aprendiz['fecha_nac']))->format('Y-m-d'); ?></td>
                                    <td><?php echo htmlspecialchars($aprendiz['grupo_sanguineo']); ?></td>
                                    <td><?php echo htmlspecialchars($aprendiz['tipo_documento']); ?></td>
                                    <td><?php echo htmlspecialchars($aprendiz['numero_documento']); ?></td>
                                    <td><?php echo htmlspecialchars($aprendiz['direccion']); ?></td>
                                    <td>
                                        <a href="view/modificar_aprendiz.php?id=<?php echo $aprendiz['id']; ?>" class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pencil"></i> Editar
                                        </a>
                                        <a href="eliminar_aprendiz.php?id=<?php echo $aprendiz['id']; ?>" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- Botón para regresar con ícono -->
                    <a href="../index.php" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
