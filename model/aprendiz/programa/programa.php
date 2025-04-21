<?php
require_once 'D:/laragon/www/CRUD_APRENDICES/conexion/conexion.php';

class ProgramaModel {
    private $pdo;

    public function __construct() {
        $this->pdo = (new Conexion)->conectar();
    }

    public function obtenerProgramas() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM programas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los programas: " . $e->getMessage();
            return [];
        }
    }

    public function crearPrograma($nombre) {
        try {
            $sql = "INSERT INTO programas (nombre) VALUES (:nombre)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear el programa: " . $e->getMessage();
            return false;
        }
    }

    public function actualizarPrograma($id, $nombre) {
        try {
            $sql = "UPDATE programas SET nombre = :nombre WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el programa: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerProgramaPorId($id) {
        try {
            $stmt = $this->pdo->prepare("SELECT id, nombre FROM programas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener programas: " . $e->getMessage();
            return [];
        }
    }

    public function eliminarPrograma($id) {
        try {
            $sql = "DELETE FROM programas WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el programa: " . $e->getMessage();
            return false;
        }
    }
}
?>
