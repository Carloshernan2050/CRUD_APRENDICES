<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Aprendices</title>
</head>
<body>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'Aprendiz guardado con éxito'): ?>
        <div>
            ✔️ ¡Aprendiz guardado con éxito!
        </div>
    <?php endif; ?>

    <h1>Lista de Aprendices</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Primer Nombre</th>
                <th>Primer Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($aprendices)): ?>
                <?php foreach ($aprendices as $aprendiz): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($aprendiz['id']); ?></td>
                        <td><?php echo htmlspecialchars($aprendiz['primer_nombre']); ?></td>
                        <td><?php echo htmlspecialchars($aprendiz['primer_apellido']); ?></td>
                        <td><?php echo htmlspecialchars($aprendiz['fecha_nac']); ?></td>
                        <td>
                            <a href="index.php?action=formularioAprendiz&id=<?php echo $aprendiz['id']; ?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">No hay aprendices registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <a href="index.php?action=formularioAprendiz">Crear Nuevo Aprendiz</a>

</body>
</html>
