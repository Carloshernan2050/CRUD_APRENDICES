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

    public function crearAprendiz($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $sexo, $fecha_nac, $grupo_sanguineo, $tipo_documento, $numero_documento, $direccion) {
        try {
            $sql = "INSERT INTO personas (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, fecha_nac, grupo_sanguineo, tipo_documento, numero_documento, direccion)
                    VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :sexo, :fecha_nac, :grupo_sanguineo, :tipo_documento, :numero_documento, :direccion)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':primer_nombre', $primer_nombre);
            $stmt->bindParam(':segundo_nombre', $segundo_nombre);
            $stmt->bindParam(':primer_apellido', $primer_apellido);
            $stmt->bindParam(':segundo_apellido', $segundo_apellido);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':fecha_nac', $fecha_nac);
            $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo);
            $stmt->bindParam(':tipo_documento', $tipo_documento);
            $stmt->bindParam(':numero_documento', $numero_documento);
            $stmt->bindParam(':direccion', $direccion);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear el aprendiz: " . $e->getMessage();
            return false;
        }
    }

    public function verAprendices() {
        try {
            $stmt = $this->pdo->prepare("SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, fecha_nac, grupo_sanguineo, tipo_documento, numero_documento, direccion FROM personas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al ver los aprendices: " . $e->getMessage();
            return false;
        }
    }

    public function modificarAprendiz($id, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $sexo, $fecha_nac, $grupo_sanguineo, $tipo_documento, $numero_documento, $direccion) {
        try {
            $sql = "UPDATE personas SET
                        primer_nombre = :primer_nombre,
                        segundo_nombre = :segundo_nombre,
                        primer_apellido = :primer_apellido,
                        segundo_apellido = :segundo_apellido,
                        sexo = :sexo,
                        fecha_nac = :fecha_nac,
                        grupo_sanguineo = :grupo_sanguineo,
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
            $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo);
            $stmt->bindParam(':tipo_documento', $tipo_documento);
            $stmt->bindParam(':numero_documento', $numero_documento);
            $stmt->bindParam(':direccion', $direccion);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al modificar el aprendiz: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerAprendizPorId($id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM personas WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener el aprendiz: " . $e->getMessage();
            return false;
        }
    }
}
?>
