<?php
require_once 'D:/laragon/www/CRUD_APRENDICES/model/aprendiz/aprendiz.php';

class AprendizController {
    private $modelo;

    public function __construct() {
        $this->modelo = new aprendizModel();
    }

    public function verAprendices() {
        $aprendices = $this->modelo->obtenerAprendiz();
        return $aprendices;
    }

    public function guardarAprendiz($id = null) {
        // Verificar si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger los datos del formulario con valores predeterminados
            $primer_nombre = $_POST['primer_nombre'] ?? '';
            $segundo_nombre = $_POST['segundo_nombre'] ?? '';
            $primer_apellido = $_POST['primer_apellido'] ?? '';
            $segundo_apellido = $_POST['segundo_apellido'] ?? '';
            $sexo = $_POST['sexo'] ?? '';
            $fecha_nac = $_POST['fecha_nac'] ?? '';
            $grupo_sanguineo = $_POST['grupo_sanguineo'] ?? '';
            $tipo_documento = $_POST['tipo_documento'] ?? '';
            $numero_documento = $_POST['numero_documento'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
    
            // Validación de los campos obligatorios
            if (empty($primer_nombre) || empty($primer_apellido) || empty($sexo) || empty($fecha_nac)) {
                echo "Por favor, complete todos los campos obligatorios.";
                return;
            }
    
            // Dependiendo de si se edita o se crea un nuevo aprendiz
            if ($id === null) {
                // Crear un nuevo aprendiz
                $exito = $this->modelo->crearAprendiz(
                    $primer_nombre,
                    $segundo_nombre,
                    $primer_apellido,
                    $segundo_apellido,
                    $sexo,
                    $fecha_nac,
                    $grupo_sanguineo,
                    $tipo_documento,
                    $numero_documento,
                    $direccion
                );
            } else {
                // Modificar un aprendiz existente
                $exito = $this->modelo->modificarAprendiz(
                    $id,
                    $primer_nombre,
                    $segundo_nombre,
                    $primer_apellido,
                    $segundo_apellido,
                    $sexo,
                    $fecha_nac,
                    $grupo_sanguineo,
                    $tipo_documento,
                    $numero_documento,
                    $direccion
                );
            }
    
            // Verificar si la operación fue exitosa y redirigir
            if ($exito) {
                header("Location: index.php?action=verAprendices&mensaje=Aprendiz guardado con éxito");
                exit;
            } else {
                echo "Error al guardar el aprendiz.";
            }
        }
    }
    
    public function formularioAprendiz($id = null) {
        if ($id !== null) {
            $aprendiz = $this->modelo->obtenerAprendizPorId($id);
            if (!$aprendiz) {
                echo "No se encontraron datos para este aprendiz.";
                return;
            }
            // Asegúrate de pasar los datos del aprendiz a la vista
            require_once 'view/modificar_aprendiz.php';
        } else {
            // Si no hay ID, mostrar el formulario para crear un nuevo aprendiz
            require_once 'view/crear_aprendiz.php';
        }
    }
    
    
}
?>
