<?php if (isset($aprendiz)): ?>
    <form action="index.php?action=guardar_aprendiz&id=<?php echo $aprendiz['id']; ?>" method="POST">
        <label for="primer_nombre">Primer Nombre</label>
        <input type="text" name="primer_nombre" value="<?php echo htmlspecialchars($aprendiz['primer_nombre']); ?>" required>

        <label for="segundo_nombre">Segundo Nombre</label>
        <input type="text" name="segundo_nombre" value="<?php echo htmlspecialchars($aprendiz['segundo_nombre']); ?>">

        <label for="primer_apellido">Primer Apellido</label>
        <input type="text" name="primer_apellido" value="<?php echo htmlspecialchars($aprendiz['primer_apellido']); ?>" required>

        <label for="segundo_apellido">Segundo Apellido</label>
        <input type="text" name="segundo_apellido" value="<?php echo htmlspecialchars($aprendiz['segundo_apellido']); ?>">

        <label for="sexo">Sexo</label>
        <select name="sexo" required>
            <option value="M" <?php echo ($aprendiz['sexo'] == 'M' ? 'selected' : ''); ?>>Masculino</option>
            <option value="F" <?php echo ($aprendiz['sexo'] == 'F' ? 'selected' : ''); ?>>Femenino</option>
        </select>

        <label for="fecha_nac">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nac" value="<?php echo $aprendiz['fecha_nac']; ?>" required>

        <!-- Resto de campos para grupo sanguíneo, tipo de documento, etc. -->

        <button type="submit">Guardar Cambios</button>
    </form>
<?php else: ?>
    <p>No se encontraron datos del aprendiz.</p>
<?php endif; ?>
