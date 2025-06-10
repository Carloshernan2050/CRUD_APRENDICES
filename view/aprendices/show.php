<?php
    require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/head.php");
    require_once("C://xampp/htdocs/CRUD_APRENDICES/controller/aprendizController.php");
    $aprendiz = new AprendizController();
    $date= $aprendiz->show($_GET['id']);
?>
<div class="container py-4">
    <div class="card shadow-lg">
        <div class="encabezados-lista">
            <h2 class="mb-0">Detalles del Aprendiz</h2>
        </div>
        <div class="card-body">

            <div class="mb-4 d-flex justify-content-center gap-3">
                <a href="/CRUD_APRENDICES/view/aprendices/index.php" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <a href="/CRUD_APRENDICES/view/aprendices/editar.php?id=<?= $date['id'] ?>" class="btn btn-success">
                    <i class="fas fa-edit"></i> 
                </a>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="fas fa-trash-alt"></i> 
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-primary text-center">
                        <tr>
                            <th  colspan="2">Información Personal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><th>ID del Aprendiz</th><td><?= $date['id'] ?></td></tr>
                        <tr><th>Primer Nombre</th><td><?= $date['primer_nombre'] ?></td></tr>
                        <tr><th>Segundo Nombre</th><td><?= $date['segundo_nombre'] ?></td></tr>
                        <tr><th>Primer Apellido</th><td><?= $date['primer_apellido'] ?></td></tr>
                        <tr><th>Segundo Apellido</th><td><?= $date['segundo_apellido'] ?></td></tr>
                    </tbody>

                    <thead class="table-primary text-center">
                        <tr>
                            <th colspan="2">Identificación y Contacto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><th>Tipo de Documento</th><td><?= $date['tipo_documento'] ?></td></tr>
                        <tr><th>Número de Documento</th><td><?= $date['documento'] ?></td></tr>
                        <tr><th>Teléfono</th><td><?= $date['telefono'] ?></td></tr>
                        <tr><th>Correo Electrónico</th><td><?= $date['correo'] ?></td></tr>
                    </tbody>

                    <thead class="table-primary text-center">
                        <tr>
                            <th colspan="2">Información Complementaria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><th>Fecha de Nacimiento</th><td><?= $date['fecha_nacimiento'] ?></td></tr>
                        <tr><th>Género</th><td><?= $date['genero'] ?></td></tr>
                        <tr><th>Grupo Sanguíneo</th><td><?= $date['grupo_sanguineo'] ?></td></tr>
                    </tbody>

                    <thead class="table-primary text-center">
                        <tr>
                            <th colspan="2">Programa de Formación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><th>Nombre del Programa</th><td><?= $date['programa_formacion'] ?></td></tr>
                        <tr><th>Numero de ficha</th><td><?= $date['numero_de_ficha'] ?></td></tr>
                        <tr><th>Nivel de Formación</th><td><?= $date['nivel'] ?></td></tr>
                        <tr><th>Fecha de Inicio</th><td><?= $date['fecha_inicio'] ?></td></tr>
                        <tr><th>Fecha de Finalización</th><td><?= $date['fecha_fin'] ?></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar al aprendiz? Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="delete.php?id=<?= $date['id'] ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
</div>


<?php
require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/footer.php");
?>