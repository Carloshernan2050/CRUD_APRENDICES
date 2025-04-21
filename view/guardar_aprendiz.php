<?php
require_once 'model/aprendizModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturamos y sanitizamos los datos del formulario
    $primer_nombre       = htmlspecialchars(trim($_POST['primer_nombre'] ?? ''));
    $segundo_nombre      = htmlspecialchars(trim($_POST['segundo_nombre'] ?? ''));
    $primer_apellido     = htmlspecialchars(trim($_POST['primer_apellido'] ?? ''));
    $segundo_apellido    = htmlspecialchars(trim($_POST['segundo_apellido'] ?? ''));
    $sexo                = htmlspecialchars(trim($_POST['sexo'] ?? ''));
    $fecha_nac           = htmlspecialchars(trim($_POST['fecha_nac'] ?? ''));
    $id_grupo_sanguineo  = htmlspecialchars(trim($_POST['id_grupo_sanguineo'] ?? ''));
    $tipo_documento      = htmlspecialchars(trim($_POST['tipo_documento'] ?? ''));
    $numero_documento    = htmlspecialchars(trim($_POST['numero_documento'] ?? ''));
    $direccion           = htmlspecialchars(trim($_POST['direccion'] ?? ''));

    // Validamos que no falten campos importantes
    if (empty($primer_nombre) || empty($primer_apellido) || empty($sexo) || empty($fecha_nac) || empty($id_grupo_sanguineo) || empty($tipo_documento) || empty($numero_documento) || empty($direccion)) {
        echo "Todos los campos obligatorios deben ser completados.";
        exit;
    }

    // Creamos el aprendiz
    $modelo = new aprendizModel();
    $resultado = $modelo->crearAprendiz(
        $primer_nombre,
        $segundo_nombre,
        $primer_apellido,
        $segundo_apellido,
        $sexo,
        $fecha_nac,
        $id_grupo_sanguineo,
        $tipo_documento,
        $numero_documento,
        $direccion
    );

    if ($resultado) {
        // Redirigimos con un mensaje de éxito
        header("Location: index.php?mensaje=aprendiz_creado");
        exit;
    } else {
        // Mostramos un error si la creación falla
        echo "Error al guardar el aprendiz. Intente nuevamente más tarde.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
