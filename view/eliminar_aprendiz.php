<?php
require_once 'D:/laragon/www/CRUD_APRENDICES/model/aprendiz/aprendiz.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $modelo = new aprendizModel();
    $resultado = $modelo->eliminarAprendiz($id);

    if ($resultado) {
        header("Location: ver_aprendices.php?mensaje=eliminado");
        exit;
    } else {
        echo "Error al eliminar el aprendiz.";
    }
} else {
    echo "ID no proporcionado.";
}
?>
