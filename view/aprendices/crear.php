<?php
    require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/head.php");
?>
    
    <form action="store.php" method="POST" autocomplete="off">

    <div class="card mb-4">
        <div class="encabezados-lista">
            <h3 class="mb-0">Formulario de Registro</h3>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header editar-crear">Información Personal</div>
        <div class="card-body row g-3">
            <div class="col-md-3">
                <label for="primer_nombre" class="form-label">Primer Nombre</label>
                <input type="text" name="primer_nombre" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                <input type="text" name="segundo_nombre" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="primer_apellido" class="form-label">Primer Apellido</label>
                <input type="text" name="primer_apellido" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                <input type="text" name="segundo_apellido" class="form-control">
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header editar-crear">Identificación y Contacto</div>
        <div class="card-body row g-3">
            <div class="col-md-4">
                <label for="id_tipo_documento" class="form-label">Tipo de Documento</label>
                <select class="form-select" name="id_tipo_documento" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="1">Tarjeta de identidad</option>
                    <option value="2">Cédula de ciudadania</option>
                    <option value="3">Cédula de extranjería</option>
                    <option value="4">Tarjeta de extranjería</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="documento" class="form-label">Número de Documento</label>
                <input type="text" name="documento" class="form-control" minlength="5" maxlength="10" required>
            </div>
            <div class="col-md-4">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" name="correo" class="form-control" autocomplete="on" required>
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" name="telefono" class="form-control" pattern="[0-9]{7,10}" required>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header editar-crear">Información Complementaria</div>
        <div class="card-body row g-3">
            <div class="col-md-6">
                <label for="id_genero" class="form-label">Género</label>
                <select class="form-select" name="id_genero" required>
                    <option value="" selected disabled>Seleccione una opción</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Otro</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="id_grupo_sanguineo" class="form-label">Grupo Sanguíneo</label>
                <select class="form-select" name="id_grupo_sanguineo" required>
                    <option value="" selected disabled>Seleccione una opción</option>
                    <option value="1">A+</option>
                    <option value="2">A-</option>
                    <option value="3">B+</option>
                    <option value="4">B-</option>
                    <option value="5">AB+</option>
                    <option value="6">AB-</option>
                    <option value="7">O+</option>
                    <option value="8">O-</option>
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
                <option value="" selected disabled>Seleccione una opción</option>
                    <optgroup label="Técnicos">
                        <option value="1">Técnico en Sistemas</option>
                        <option value="2">Técnico en Asistencia Administrativa</option>
                        <option value="3">Técnico en Cocina</option>
                        <option value="4">Técnico en Contabilidad</option>
                        <option value="5">Técnico en Manejo Ambiental</option>
                        <option value="6">Técnico en Logística Empresarial</option>
                    </optgroup>
                    <optgroup label="Tecnólogos">
                        <option value="7">Tecnólogo en ADSO</option>
                        <option value="8">Tecnólogo en Gestión Administrativa</option>
                        <option value="9">Tecnólogo en Talento Humano</option>
                        <option value="10">Tecnólogo en Logística</option>
                        <option value="11">Tecnólogo en Agropecuaria</option>
                        <option value="12">Tecnólogo en Control Ambiental</option>
                    </optgroup>
                </select>
            </div>
            <div class="col-md-4">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="fecha_fin" class="form-label">Fecha de Finalización</label>
                <input type="date" name="fecha_fin" class="form-control" required>
            </div>
        </div>
    </div>

    <div class=" text-center mt-4">
        <button type="submit" class="btn btn-primary me-2">Guardar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
    </div>
</form>

<?php
    require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/footer.php");
?>
