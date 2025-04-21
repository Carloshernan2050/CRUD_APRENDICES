<?php
// Incluir archivo de conexión a la base de datos
require_once 'D:/laragon/www/CRUD_APRENDICES/model/aprendiz/aprendiz.php'; 

// Crear una instancia de la clase Conexion
$conexion = new Conexion();
$pdo = $conexion->conectar();

// Arreglo de mapeo entre el tipo de documento y el ID correspondiente
$tipo_documento_mapping = [
    'CC' => 1,  // Cédula
    'TI' => 2,  // Tarjeta de Identidad
    'CE' => 3,  // Cédula de Extranjería
    // Agrega más tipos según sea necesario
];

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $sexo = $_POST['sexo'];
    $fecha_nac = $_POST['fecha_nac'];
    $grupo_sanguineo = $_POST['grupo_sanguineo'];
    $tipo_documento = $_POST['tipo_documento']; // Este valor será algo como 'CC', 'TI', etc.
    $numero_documento = $_POST['numero_documento'];
    $direccion = $_POST['direccion'];

    // Convertir el tipo de documento de texto (CC, TI, CE) a su ID correspondiente
    if (isset($tipo_documento_mapping[$tipo_documento])) {
        $id_tipo_documento = $tipo_documento_mapping[$tipo_documento];  // Convertimos el valor 'CC' a su ID (1)
    } else {
        $id_tipo_documento = null; // Si no existe, asignamos null o un valor por defecto
    }

    // Si no hay ID, estamos creando un nuevo aprendiz, sino estamos editando uno existente
    if (empty($id)) {
        // Consulta para insertar un nuevo aprendiz
        $sql = "INSERT INTO personas (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, fecha_nac, id_grupo_sanguineo, id_tipo_documento, numero_documento, direccion) 
                VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :sexo, :fecha_nac, :grupo_sanguineo, :id_tipo_documento, :numero_documento, :direccion)";
        
        $stmt = $pdo->prepare($sql);
        
        // Vinculando los parámetros con los datos del formulario
        $stmt->bindParam(':primer_nombre', $primer_nombre, PDO::PARAM_STR);
        $stmt->bindParam(':segundo_nombre', $segundo_nombre, PDO::PARAM_STR);
        $stmt->bindParam(':primer_apellido', $primer_apellido, PDO::PARAM_STR);
        $stmt->bindParam(':segundo_apellido', $segundo_apellido, PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_nac', $fecha_nac, PDO::PARAM_STR);
        $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo, PDO::PARAM_INT);
        $stmt->bindParam(':id_tipo_documento', $id_tipo_documento, PDO::PARAM_INT);  // Cambiado a entero
        $stmt->bindParam(':numero_documento', $numero_documento, PDO::PARAM_INT);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir a la lista de aprendices si el insert fue exitoso
            header('Location: ver_aprendices.php');
            exit();
        } else {
            echo "Error al guardar los datos: " . $stmt->errorInfo()[2];
        }
    } else {
        // Si hay ID, estamos actualizando un aprendiz existente
        $sql = "UPDATE personas 
                SET primer_nombre = :primer_nombre,
                    segundo_nombre = :segundo_nombre,
                    primer_apellido = :primer_apellido,
                    segundo_apellido = :segundo_apellido,
                    sexo = :sexo,
                    fecha_nac = :fecha_nac,
                    id_grupo_sanguineo = :grupo_sanguineo,
                    id_tipo_documento = :id_tipo_documento,
                    numero_documento = :numero_documento,
                    direccion = :direccion
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        
        // Vinculando los parámetros con los datos del formulario
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':primer_nombre', $primer_nombre, PDO::PARAM_STR);
        $stmt->bindParam(':segundo_nombre', $segundo_nombre, PDO::PARAM_STR);
        $stmt->bindParam(':primer_apellido', $primer_apellido, PDO::PARAM_STR);
        $stmt->bindParam(':segundo_apellido', $segundo_apellido, PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_nac', $fecha_nac, PDO::PARAM_STR);
        $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo, PDO::PARAM_INT);
        $stmt->bindParam(':id_tipo_documento', $id_tipo_documento, PDO::PARAM_INT);  // Cambiado a entero
        $stmt->bindParam(':numero_documento', $numero_documento, PDO::PARAM_INT);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir a la lista de aprendices si la actualización fue exitosa
            header('Location: ver_aprendices.php');
            exit();
        } else {
            echo "Error al actualizar los datos: " . $stmt->errorInfo()[2];
        }
    }
} else {
    echo "Método no permitido.";
}
?>
