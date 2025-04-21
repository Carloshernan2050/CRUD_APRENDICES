<?php
require_once 'D:/laragon/www/CRUD_APRENDICES/conexion/conexion.php';

class aprendizModel {
    private $pdo;

    public function __construct() {
        $this->pdo = (new Conexion)->conectar();
    }

    public function obtenerAprendiz() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM personas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los aprendices: " . $e->getMessage();
            return [];
        }
    }

    public function obtenerGruposSanguineo() {
        try {
            $stmt = $this->pdo->prepare("SELECT id, nombre FROM grupo_sanguineo");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los grupos sanguíneos: " . $e->getMessage();
            return [];
        }
    }

    public function crearAprendiz($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $sexo, $fecha_nac, $id_grupo_sanguineo, $tipo_documento, $numero_documento, $direccion) {
        try {
            $sql = "INSERT INTO personas (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, fecha_nac, id_grupo_sanguineo, tipo_documento, numero_documento, direccion)
                    VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :sexo, :fecha_nac, :id_grupo_sanguineo, :tipo_documento, :numero_documento, :direccion)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':primer_nombre', $primer_nombre);
            $stmt->bindParam(':segundo_nombre', $segundo_nombre);
            $stmt->bindParam(':primer_apellido', var: $primer_apellido);
            $stmt->bindParam(':segundo_apellido', $segundo_apellido);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':fecha_nac', $fecha_nac);
            $stmt->bindParam(':id_grupo_sanguineo', $id_grupo_sanguineo);
            $stmt->bindParam(':tipo_documento', $tipo_documento);
            $stmt->bindParam(':numero_documento', $numero_documento);
            $stmt->bindParam(':direccion', $direccion);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear el aprendiz: " . $e->getMessage();
            return false;
        }
    }

    public function actualizarAprendiz($id, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $sexo, $fecha_nac, $id_grupo_sanguineo, $tipo_documento, $numero_documento, $direccion) {
        try {
            $sql = "UPDATE personas SET 
                        primer_nombre = :primer_nombre,
                        segundo_nombre = :segundo_nombre,
                        primer_apellido = :primer_apellido,
                        segundo_apellido = :segundo_apellido,
                        sexo = :sexo,
                        fecha_nac = :fecha_nac,
                        id_grupo_sanguineo = :id_grupo_sanguineo,
                        tipo_documento = :tipo_documento,
                        numero_documento = :numero_documento,
                        direccion = :direccion
                    WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':primer_nombre', $primer_nombre);
            $stmt->bindParam(':segundo_nombre', $segundo_nombre);
            $stmt->bindParam(':primer_apellido', $primer_apellido);
            $stmt->bindParam(':segundo_apellido', $segundo_apellido);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':fecha_nac', $fecha_nac);
            $stmt->bindParam(':id_grupo_sanguineo', $id_grupo_sanguineo);
            $stmt->bindParam(':tipo_documento', $tipo_documento);
            $stmt->bindParam(':numero_documento', $numero_documento);
            $stmt->bindParam(':direccion', $direccion);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error al actualizar el aprendiz: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerAprendizPorId($id) {
        try {
            $sql = "SELECT * FROM personas WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener el aprendiz por ID: " . $e->getMessage();
            return null;
        }
    }

    // ✅ Nuevo método unificado: guardar_datos (crear o actualizar)
    public function guardar_datos($datos) {
        try {
            if (isset($datos['id']) && $datos['id'] > 0) {
                // Actualizar aprendiz existente
                return $this->actualizarAprendiz(
                    $datos['id'],
                    $datos['primer_nombre'],
                    $datos['segundo_nombre'],
                    $datos['primer_apellido'],
                    $datos['segundo_apellido'],
                    $datos['sexo'],
                    $datos['fecha_nac'],
                    $datos['id_grupo_sanguineo'],
                    $datos['tipo_documento'],
                    $datos['numero_documento'],
                    $datos['direccion']
                );
            } else {
                // Crear nuevo aprendiz si no existe ID
                return $this->crearAprendiz(
                    $datos['primer_nombre'],
                    $datos['segundo_nombre'],
                    $datos['primer_apellido'],
                    $datos['segundo_apellido'],
                    $datos['sexo'],
                    $datos['fecha_nac'],
                    $datos['id_grupo_sanguineo'],
                    $datos['tipo_documento'],
                    $datos['numero_documento'],
                    $datos['direccion']
                );
            }
        } catch (Exception $e) {
            echo "Error al guardar los datos: " . $e->getMessage();
            return false;
        }
    }
    public function eliminarAprendiz($id) {
        try {
            $sql = "DELETE FROM personas WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el aprendiz: " . $e->getMessage();
            return false;
        }
    }
    
}
?>
