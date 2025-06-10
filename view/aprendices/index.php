<?php
    require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/head.php");
    require_once("C://xampp/htdocs/CRUD_APRENDICES/controller/aprendizController.php");
    $aprendiz = new AprendizController();
    $rows = $aprendiz->index();
?>

<div class="mb-3 d-flex justify-content-center gap-3">
    <a href="/CRUD_APRENDICES/index.php" class="btn btn-primary mb-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <a href="/CRUD_APRENDICES/view/aprendices/crear.php" class="btn btn-primary mb-3">
         <i class="fas fa-user-plus"></i> Agregar Aprendiz
    </a>
</div>

<div class="table-responsive">
    <div class="card mb-4">
        <div class="encabezados-lista">
            <h3 class="mb-0 ">Lista de Aprendices</h3>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-sm table-light">
        <thead class="table-primary text-center">
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo de Documento</th>
                <th>Documento</th>
                <th>Teléfono</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($rows): ?>
                <?php $contador = 1; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="text-center">
                        <th scope="row"><?= $contador ?></th>
                        <td><?= $row['Nombre']; ?></td>
                        <td><?= $row['Apellido']; ?></td>
                        <td><?= $row['Tipo_documento']; ?></td>
                        <td><?= $row['documento']; ?></td>
                        <td><?= $row['telefono']; ?></td>
                        <td><?= $row['edad']; ?> años</td>
                        <td class="text-center">
                            <a href="show.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id'] ?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $row['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel<?= $row['id'] ?>">¿Eliminar aprendiz?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Está seguro que desea eliminar al aprendiz? Esta acción no se puede deshacer..</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $contador++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">No hay aprendices registrados</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
    require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/footer.php");
?>
