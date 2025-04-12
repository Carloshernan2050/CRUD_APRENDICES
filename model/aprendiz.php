<?php 
require_once 'conexion/conexion.php';
class aprendizModel {
    private $pdo;
    public function __construct() {
        $this->pdo = (new Conexion)->conectar();
    }
    public function obtenerAprendiz() {
        $stmt = $this->pdo->prepare("SELECT * FROM personas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function crearAprendiz() {
        $stmt = $this->pdo->prepare("INSERT INTO personas");
        $stmt = $this->execute();
        return $stmt->fect
    }
}


