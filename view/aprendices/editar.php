<?php
    require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/head.php");
    require_once("C://xampp/htdocs/CRUD_APRENDICES/controller/aprendizController.php");
    $aprendiz = new AprendizController();
    $date= $aprendiz->show($_GET['id']);
?>
<form action="update.php?id=<?= $date['id'] ?>" method="POST" autocomplete="off">

    <div class="card mb-4">
        <div class="card-header encabezados-lista">
            <h3 class="mb-0">Modificar Información</h3>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header editar-crear">Información Personal</div>
        <div class="card-body row g-3">
            <div class="col-md-3">
                <label for="primer_nombre" class="form-label">Primer Nombre</label>
                <input type="text" name="primer_nombre" class="form-control" value="<?= $date['primer_nombre'] ?>" required>
            </div>
            <div class="col-md-3">
                <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                <input type="text" name="segundo_nombre" class="form-control" value="<?= $date['segundo_nombre'] ?>">
            </div>
            <div class="col-md-3">
                <label for="primer_apellido" class="form-label">Primer Apellido</label>
                <input type="text" name="primer_apellido" class="form-control" value="<?= $date['primer_apellido'] ?>" required>
            </div>
            <div class="col-md-3">
                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                <input type="text" name="segundo_apellido" class="form-control" value="<?= $date['segundo_apellido'] ?>">
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header editar-crear">Identificación y Contacto</div>
        <div class="card-body row g-3">
            <div class="col-md-4">
                <label for="id_tipo_documento" class="form-label">Tipo de Documento</label>
                <select class="form-select" name="id_tipo_documento" required>
                    <option value="" disabled>Seleccione una opción</option>
                    <option value="1" <?= ($date['tipo_documento'] == 1) ? 'selected' : '' ?>>Tarjeta de identidad</option>
                    <option value="2" <?= ($date['tipo_documento'] == 2) ? 'selected' : '' ?>>Cédula de ciudadanía</option>
                    <option value="3" <?= ($date['tipo_documento'] == 3) ? 'selected' : '' ?>>Cédula de extranjería</option>
                    <option value="4" <?= ($date['tipo_documento'] == 4) ? 'selected' : '' ?>>Tarjeta de extranjería</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="documento" class="form-label">Número de Documento</label>
                <input type="text" name="documento" class="form-control" value="<?= $date['documento'] ?>" minlength="5" maxlength="10" required>
            </div>
            <div class="col-md-4">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" value="<?= $date['fecha_nacimiento'] ?>" required>
            </div>
            <div class="col-md-6">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" name="correo" class="form-control" value="<?= $date['correo'] ?>" autocomplete="on" required>
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" name="telefono" class="form-control" value="<?= $date['telefono'] ?>" pattern="[0-9]{7,10}" required>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header editar-crear">Información Complementaria</div>
        <div class="card-body row g-3">
            <div class="col-md-6">
                <label for="id_genero" class="form-label">Género</label>
                <select class="form-select" name="id_genero" required>
                    <option value="" disabled>Seleccione una opción</option>
                    <option value="1" <?= ($date['genero'] == 1) ? 'selected' : '' ?>>Masculino</option>
                    <option value="2" <?= ($date['genero'] == 2) ? 'selected' : '' ?>>Femenino</option>
                    <option value="3" <?= ($date['genero'] == 3) ? 'selected' : '' ?>>Otro</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="id_grupo_sanguineo" class="form-label">Grupo Sanguíneo</label>
                <select class="form-select" name="id_grupo_sanguineo" required>
                    <option value=""  disabled>Seleccione una opción</option>
                    <option value="1" <?= ($date['grupo_sanguineo'] == 1) ? 'selected' : '' ?>>A+</option>
                    <option value="2" <?= ($date['grupo_sanguineo'] == 2) ? 'selected' : '' ?>>A-</option>
                    <option value="3" <?= ($date['grupo_sanguineo'] == 3) ? 'selected' : '' ?>>B+</option>
                    <option value="4" <?= ($date['grupo_sanguineo'] == 4) ? 'selected' : '' ?>>B-</option>
                    <option value="5" <?= ($date['grupo_sanguineo'] == 5) ? 'selected' : '' ?>>AB+</option>
                    <option value="6" <?= ($date['grupo_sanguineo'] == 6) ? 'selected' : '' ?>>AB-</option>
                    <option value="7" <?= ($date['grupo_sanguineo'] == 7) ? 'selected' : '' ?>>O+</option>
                    <option value="8" <?= ($date['grupo_sanguineo'] == 8) ? 'selected' : '' ?>>O-</option>
                </select>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header editar-crear">Programa de Formación</div>
        <div class="card-body row g-3">
            <div class="col-md-4">
                <label for="id_programa_formacion" class="form-label">Programa</label>
                <select class="form-select" name="id_programa_formacion" required>
                <option value=""  disabled>Seleccione una opción</option>
                    <optgroup label="Técnicos">
                        <option value="1" <?= ($date['programa_formacion'] == 1) ? 'selected' : '' ?>>Técnico en Sistemas</option>
                        <option value="2" <?= ($date['programa_formacion'] == 2) ? 'selected' : '' ?>>Técnico en Asistencia Administrativa</option>
                        <option value="3" <?= ($date['programa_formacion'] == 3) ? 'selected' : '' ?>>Técnico en Cocina</option>
                        <option value="4" <?= ($date['programa_formacion'] == 4) ? 'selected' : '' ?>>Técnico en Contabilidad</option>
                        <option value="5" <?= ($date['programa_formacion'] == 5) ? 'selected' : '' ?>>Técnico en Manejo Ambiental</option>
                        <option value="6" <?= ($date['programa_formacion'] == 6) ? 'selected' : '' ?>>Técnico en Logística Empresarial</option>
                    </optgroup>
                    <optgroup label="Tecnólogos">
                        <option value="7" <?= ($date['programa_formacion'] == 7) ? 'selected' : '' ?>>Tecnólogo en ADSO</option>
                        <option value="8" <?= ($date['programa_formacion'] == 8) ? 'selected' : '' ?>>Tecnólogo en Gestión Administrativa</option>
                        <option value="9" <?= ($date['programa_formacion'] == 9) ? 'selected' : '' ?>>Tecnólogo en Talento Humano</option>
                        <option value="10" <?= ($date['programa_formacion'] == 10) ? 'selected' : '' ?>>Tecnólogo en Logística</option>
                        <option value="11" <?= ($date['programa_formacion'] == 11) ? 'selected' : '' ?>>Tecnólogo en Agropecuaria</option>
                        <option value="12" <?= ($date['programa_formacion'] == 12) ? 'selected' : '' ?>>Tecnólogo en Control Ambiental</option>
                    </optgroup>
                </select>
            </div>
            <div class="col-md-4">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" class="form-control" value="<?= $date['fecha_inicio'] ?>" required>
            </div>
            <div class="col-md-4">
                <label for="fecha_fin" class="form-label">Fecha de Finalización</label>
                <input type="date" name="fecha_fin" class="form-control" value="<?= $date['fecha_fin'] ?>" required>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <button type="submit" class="btn btn-success me-2">Actualizar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
    </div>
</form>


<?php
require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/footer.php");
?>