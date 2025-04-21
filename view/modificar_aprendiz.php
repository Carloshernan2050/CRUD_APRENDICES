<?php
// Incluir el archivo de la clase Conexion
require_once 'D:/laragon/www/CRUD_APRENDICES/model/aprendiz/aprendiz.php';

// Crear una instancia de la clase Conexion
$conexion = new Conexion();
$pdo = $conexion->conectar();

// Verificar si se recibe un ID para editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener el aprendiz desde la base de datos
    $sql = "SELECT id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, fecha_nac, id_grupo_sanguineo, id_tipo_documento, numero_documento, direccion FROM personas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $aprendiz = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$aprendiz) {
        die("Aprendiz no encontrado");
    }
} else {
    die("ID no proporcionado");
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SENA || Modificar Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
</head>

<body>
    <div class="container mt-4">
        <h1>Modificar Aprendiz</h1>
        <hr>

        <form action="guardar_modificacion.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($aprendiz['id']); ?>">

            <!-- Primer Nombre -->
            <div class="mb-3">
                <label for="primer_nombre" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" value="<?php echo htmlspecialchars($aprendiz['primer_nombre']); ?>" required>
            </div>

            <!-- Segundo Nombre -->
            <div class="mb-3">
                <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" value="<?php echo htmlspecialchars($aprendiz['segundo_nombre']); ?>">
            </div>

            <!-- Primer Apellido -->
            <div class="mb-3">
                <label for="primer_apellido" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" value="<?php echo htmlspecialchars($aprendiz['primer_apellido']); ?>" required>
            </div>

            <!-- Segundo Apellido -->
            <div class="mb-3">
                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" value="<?php echo htmlspecialchars($aprendiz['segundo_apellido']); ?>">
            </div>

            <!-- Sexo -->
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" name="sexo" id="sexo" required>
                    <option value="1" <?php echo ($aprendiz['sexo'] == 1) ? 'selected' : ''; ?>>Masculino</option>
                    <option value="2" <?php echo ($aprendiz['sexo'] == 2) ? 'selected' : ''; ?>>Femenino</option>
                    <option value="3" <?php echo ($aprendiz['sexo'] == 3) ? 'selected' : ''; ?>>No registra</option>
                </select>
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" value="<?php echo htmlspecialchars($aprendiz['fecha_nac']); ?>" required>
            </div>

            <!-- Grupo Sanguíneo -->
            <div class="mb-3">
                <label for="grupo_sanguineo" class="form-label">Grupo Sanguíneo</label>
                <select class="form-select" name="grupo_sanguineo" id="grupo_sanguineo" required>
                    <?php
                    $grupos = [
                        1 => 'A+', 2 => 'B+', 3 => 'AB+', 4 => 'O+', 
                        5 => 'A-', 6 => 'B-', 7 => 'AB-', 8 => 'O-'
                    ];
                    foreach ($grupos as $id => $nombre) {
                        $selected = ($aprendiz['id_grupo_sanguineo'] == $id) ? 'selected' : '';
                        echo "<option value=\"$id\" $selected>$nombre</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Tipo de Documento -->
            <div class="mb-3">
                <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                <select class="form-select" name="tipo_documento" id="tipo_documento" required>
                    <?php
                    $tipos = ['CC' => 'Cédula de Ciudadanía', 'TI' => 'Tarjeta de Identidad', 'CE' => 'Cédula de Extranjería'];
                    foreach ($tipos as $clave => $texto) {
                        $selected = ($aprendiz['id_tipo_documento'] == $clave) ? 'selected' : '';
                        echo "<option value=\"$clave\" $selected>$texto</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Número de Documento -->
            <div class="mb-3">
                <label for="numero_documento" class="form-label">Número de Documento</label>
                <input type="number" class="form-control" name="numero_documento" id="numero_documento" value="<?php echo htmlspecialchars($aprendiz['numero_documento']); ?>" required>
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo htmlspecialchars($aprendiz['direccion']); ?>" required>
            </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" name="accion" value="guardar" class="btn btn-success">
                    <i class="fa-solid fa-save"></i> Guardar Cambios
                </button>
                <a href="ver_aprendices.php" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Volver
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
