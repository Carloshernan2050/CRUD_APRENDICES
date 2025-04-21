<?php include 'D:/laragon/www/CRUD_APRENDICES/head.php'; ?>

<?php
$esEdicion = isset($aprendiz);
$actionURL = $esEdicion
    ? "../index.php?action=modificar_aprendiz&id=" . htmlspecialchars($aprendiz['id'])
    : "../index.php?action=crear_aprendiz";
?>

<body>
<div class="container mt-4">
    <h2 class="text-center">
        <?= $esEdicion ? 'Editar Aprendiz' : 'Crear Nuevo Aprendiz'; ?>
    </h2>

    <form action="../index.php?action=guardar_aprendiz" method="POST">
        <div class="row">
            <!-- Primer Nombre -->
            <div class="col-md-6 mb-3">
                <label for="primer_nombre" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" name="primer_nombre" id="primer_nombre"
                       value="<?= $esEdicion ? htmlspecialchars($aprendiz['primer_nombre']) : '' ?>" required>
            </div>

            <!-- Segundo Nombre -->
            <div class="col-md-6 mb-3">
                <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre"
                       value="<?= $esEdicion ? htmlspecialchars($aprendiz['segundo_nombre']) : '' ?>">
            </div>

            <!-- Primer Apellido -->
            <div class="col-md-6 mb-3">
                <label for="primer_apellido" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="primer_apellido" id="primer_apellido"
                       value="<?= $esEdicion ? htmlspecialchars($aprendiz['primer_apellido']) : '' ?>" required>
            </div>

            <!-- Segundo Apellido -->
            <div class="col-md-6 mb-3">
                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido"
                       value="<?= $esEdicion ? htmlspecialchars($aprendiz['segundo_apellido']) : '' ?>">
            </div>

            <!-- Sexo -->
            <div class="col-md-4 mb-3">
                <label for="sexo">Sexo:</label>
                <select name="sexo" required>
                    <option value="1" <?= $esEdicion && $aprendiz['sexo'] == 1 ? 'selected' : '' ?>>Masculino</option>
                    <option value="2" <?= $esEdicion && $aprendiz['sexo'] == 2 ? 'selected' : '' ?>>Femenino</option>
                    <option value="3" <?= $esEdicion && $aprendiz['sexo'] == 3 ? 'selected' : '' ?>>No registra</option>
                </select>
            </div>

            <!-- Fecha de nacimiento -->
            <div class="col-md-4 mb-3">
                <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nac" id="fecha_nac"
                       value="<?= $esEdicion ? htmlspecialchars($aprendiz['fecha_nac']) : '' ?>" required>
            </div>

            <!-- Grupo sanguíneo -->
            <div class="col-md-4 mb-3">
                <label for="grupo_sanguineo" class="form-label">Grupo Sanguíneo</label>
                    <select class="form-select" name="grupo_sanguineo" id="grupo_sanguineo" required>
                        <option value="0" disabled <?= !$esEdicion ? 'selected' : '' ?>>Selecciona</option>
                        <?php
                        // Definir grupos sanguíneos con positivos primero
                        $grupos = [
                            1 => 'A+', 2 => 'B+', 3 => 'AB+', 4 => 'O+', 
                            5 => 'A-', 6 => 'B-', 7 => 'AB-', 8 => 'O-'
                        ];
                        foreach ($grupos as $id => $nombre) {
                            // Si estamos en modo edición, seleccionamos el grupo sanguíneo actual
                            $selected = $esEdicion && $aprendiz['id_grupo_sanguineo'] == $id ? 'selected' : '';
                            echo "<option value=\"$id\" $selected>$nombre</option>";
                        }
                        ?>
                    </select>
            </div>

            <!-- Tipo documento -->
            <div class="col-md-6 mb-3">
                <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                <select class="form-select" name="tipo_documento" id="tipo_documento" required>
                    <option value="" disabled <?= !$esEdicion ? 'selected' : '' ?>>Selecciona</option>
                    <?php
                    // Ordenar tipos de documento
                    $tipos = ['CC' => 'Cédula de Ciudadanía (CC)', 'TI' => 'Tarjeta de Identidad (TI)', 'CE' => 'Cédula de Extranjería (CE)'];
                    foreach ($tipos as $clave => $texto) {
                        $selected = $esEdicion && $aprendiz['tipo_documento'] === $clave ? 'selected' : '';
                        echo "<option value=\"$clave\" $selected>$texto</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Número documento -->
            <div class="col-md-6 mb-3">
                <label for="numero_documento" class="form-label">Número de Documento</label>
                <input type="number" class="form-control" name="numero_documento" id="numero_documento"
                       value="<?= $esEdicion ? htmlspecialchars($aprendiz['numero_documento']) : '' ?>" required>
            </div>

            <!-- Dirección -->
            <div class="col-12 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" id="direccion"
                       value="<?= $esEdicion ? htmlspecialchars($aprendiz['direccion']) : '' ?>" required>
            </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" name="accion" value="guardar" class="btn btn-success">
                    <?= $esEdicion ? 'Actualizar Aprendiz' : 'Guardar Aprendiz'; ?>
                </button>
                <a href="../index.php" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
